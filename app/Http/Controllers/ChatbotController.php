<?php

namespace App\Http\Controllers;

use App\Models\ChatbotDb;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Similarity\JaccardIndex;
use NlpTools\Similarity\CosineSimilarity;
use NlpTools\Similarity\Simhash;

class ChatbotController extends Controller
{
    //
    public function chatbot_msg(Request $request)
    {
        $request->validate([
            'pattern' => ['required'],
        ]);

        $chat_input = $request->pattern;
        $chat_clean1 = preg_replace('/\W+/', '_', $chat_input);
        $chat_explode = explode("_", $chat_clean1);
        $chat_explode = array_filter($chat_explode, fn ($value) => !is_null($value) && $value !== '');

        $chat_clean_implode = implode(" ", $chat_explode);


        $data_query = [];
        foreach ($chat_explode as $keyword) {
            $data = ChatbotDb::where('pattern', 'like', '%' . $keyword . '%')->get();
            if (count($data) > 0) {
                foreach ($data as $d) {
                    # code...
                    array_push($data_query, $d);
                }
            }
        }

        $data_query = array_unique($data_query);

        $tokenizer = new WhitespaceTokenizer();
        $cos = new CosineSimilarity();
        $J = new JaccardIndex();
        $simhash = new Simhash(16);

        $similarity = [];
        $values = [];
        foreach ($data_query as $data) {
            $set_key = $tokenizer->tokenize(strtolower($chat_clean_implode));
            $set_pattern = $tokenizer->tokenize(strtolower($data->pattern));

            $val = $cos->similarity($set_key, $set_pattern);
            $sim_data = ['data' => $data, 'val' => $val];
            array_push($similarity, $sim_data);
            array_push($values, $val);
        }

        $index_array = array_search(max($values), $values);
        // dd($similarity);

        $responses_msg = $similarity[$index_array]['data'];
        switch ($responses_msg['type']) {
            case 'greeting':
                return (array('type'=>'greeting','data'=>$responses_msg));
                break;

            case 'exception':
                return (array('type'=>'exception','data'=>$responses_msg));
                break;
            
            case 'publication':
                $api_publication = 'https://webapi.bps.go.id/v1/api/view/domain/1600/model/publication/lang/ind/id/'.$responses_msg['api_id'].'/key/6a75777163d631054734a55fb91f8f07/';
                $detail_pub = Http::get($api_publication)->json()['data'];
                // dd($detail_pub);
                return (array('type'=>'publication','data'=>$detail_pub));
                break;
            
            case 'statictable':
                $api_table = 'https://webapi.bps.go.id/v1/api/view/domain/1600/model/statictable/lang/ind/id/'.$responses_msg['api_id'].'/key/6a75777163d631054734a55fb91f8f07/';
                $detail_table = Http::get($api_table)->json()['data'];
                return (array('type'=>'statictable','data'=>$detail_table));
                break;
            
            default:
                return $responses_msg;
                break;
        }
        return $responses_msg;
    }

    public function sync_publication_data()
    {
        $api = 'https://webapi.bps.go.id/v1/api/list/model/publication/lang/ind/domain/1600/key/6a75777163d631054734a55fb91f8f07/';
        $response_api = Http::get($api);
        $total_pages = $response_api->json()['data'][0]['pages'];

        for ($i = 1; $i < $total_pages; $i++) {
            $api_per_page = 'https://webapi.bps.go.id/v1/api/list/model/publication/lang/ind/domain/1600/page/' . $i . '/key/6a75777163d631054734a55fb91f8f07/';

            $response_api_per_page = Http::get($api_per_page);
            $data_publication = $response_api_per_page->json()['data'][1];

            foreach ($data_publication as $data) {
                try {
                    ChatbotDb::updateOrCreate(
                        [
                            'api_id' => $data['pub_id'],
                        ],
                        [
                            'pattern' => $data['title'],
                            'response' => 'Berikut ini adalah publikasi',
                            'type' => 'publication',
                            'api_title' => $data['title'],
                            'api_cover' => $data['cover'],
                            'api_download' => $data['pdf'],
                        ]
                    );
                } catch (Exception $e) {
                    return response()->json([
                        'error' => 'Whoops, looks like something went wrong.',
                        'debug' => $e->getMessage()
                    ]);
                }
            }
        }
    }

    public function sync_statictable_data(){
        $api = 'https://webapi.bps.go.id/v1/api/list/model/statictable/lang/ind/domain/1600/key/6a75777163d631054734a55fb91f8f07/';
        $response_api = Http::get($api);
        $total_pages = $response_api->json()['data'][0]['pages'];

        for ($i = 1; $i < $total_pages; $i++) {
            $api_per_page = 'https://webapi.bps.go.id/v1/api/list/model/statictable/lang/ind/domain/1600/page/'.$i.'/key/6a75777163d631054734a55fb91f8f07/';

            $response_api_per_page = Http::get($api_per_page);
            $data_statictable = $response_api_per_page->json()['data'][1];

            foreach ($data_statictable as $data) {
                try {
                    ChatbotDb::updateOrCreate(
                        [
                            'api_id' => $data['table_id'],
                        ],
                        [
                            'pattern' => $data['title'],
                            'response' => 'Berikut ini adalah tabel',
                            'type' => 'statictable',
                            'api_title' => $data['title'],
                            'api_download' => $data['excel'],
                        ]
                    );
                } catch (Exception $e) {
                    return response()->json([
                        'error' => 'Whoops, looks like something went wrong.',
                        'debug' => $e->getMessage()
                    ]);
                }
            }
        }
    }
}
