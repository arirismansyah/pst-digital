<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Subjectmatter;
use App\Models\Zoom;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class KonsultasiController extends Controller
{
    //
    public function zoom(){
        $data_zoom = Zoom::paginate(10);
        return view('admin/pages/zoom', compact('data_zoom'));
    }

    public function add_zoom(Request $request){
        $request->validate([
            'title'=>['required'],
            'meeting_number'=>['required', 'unique:zoom'],
            'passcode'=>['required'],
            'sdk_key'=>['required'],
        ]);

        $zoom = Zoom::create([
            'title'=>$request->title,
            'meeting_number'=>$request->meeting_number,
            'passcode'=>$request->passcode,
            'sdk_key'=>$request->sdk_key,
        ]);

        if ($zoom) {
            return redirect()->back()->with('success', 'Data Zoom berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Data Zoom gagal ditambahkan.');
        }
    }

    public function edit_zoom(Request $request){
        $request->validate([
            'id'=>['required'],
            'title'=>['required'],
            'meeting_number'=>['required'],
            'passcode'=>['required'],
            'sdk_key'=>['required'],
        ]);

        $zoom = Zoom::find($request->id)->update(array(
            'title'=>$request->title,
            'meeting_number'=>$request->meeting_number,
            'passcode'=>$request->passcode,
            'sdk_key'=>$request->sdk_key,
        ));

        if ($zoom>0) {
            return redirect()->back()->with('success', 'Data Zoom berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Data Zoom gagal diperbaharui.');
        }
    }

    public function delete_zoom(Request $request){
        $request->validate([
            'id'=>['required']
        ]);

        $affectedRows = Zoom::find($request->id)->delete();
        if ($affectedRows>0) {
            return redirect()->back()->with('success', 'Data Zoom berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data Zoom gagal dihapus.');
        }
    }


    public function jadwal_konsultasi(){
        $subjectmatters = Subjectmatter::all(); 
        $data_roles = Role::all();
        return view('admin/pages/jadwal_konsultasi', compact('subjectmatters', 'data_roles'));
    }

    public function get_konsultasi_all(){
        $data_konsultasi = Konsultasi::all();
        return $data_konsultasi;
    }

    public function add_konsultasi(Request $request){
        $request->validate([
            'nama_konsultasi' => ['required'],
            'kode_konsultasi' => ['required', 'unique:konsultasi'],
            'id_customer' => ['required'],
            'id_jenis_konsultasi' => ['required'],
            'pic_konsultasi' => ['required'],
            'mulai_konsultasi' => ['required'],
            'selesai_konsultasi' => ['required'],
        ]);

        $konsultasi = Konsultasi::create([
            'nama_konsultasi' => $request->nama_konsultasi ,
            'kode_konsultasi' => $request->kode_konsultasi ,
            'id_customer' => $request->id_customer ,
            'id_jenis_konsultasi' => $request->id_jenis_konsultasi ,
            'pic_konsultasi' => $request->pic_konsultasi ,
            'mulai_konsultasi' => $request->mulai_konsultasi ,
            'selesai_konsultasi' => $request-> selesai_konsultasi,
        ]);

        if ($konsultasi) {
            return redirect()->back()->with('success', 'Jadwal Konsultasi berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Jadwal Konsultasi gagal ditambahkan.');
        }
    }


}