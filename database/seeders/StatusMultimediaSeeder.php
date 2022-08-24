<?php

namespace Database\Seeders;

use App\Models\StatusMultimedia;
use Illuminate\Database\Seeder;

class StatusMultimediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        StatusMultimedia::create([
            'status_multimedia'=>'hold'
        ]);
        StatusMultimedia::create([
            'status_multimedia'=>'publish'
        ]);
        StatusMultimedia::create([
            'status_multimedia'=>'drop'
        ]);
    }
}
