<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //

    public function index(){
        return view('guest/pages/landing');
    }

    public function conference(){
        return view('guest/pages/conference');
    }

    public function chatbot(){
        return view('guest/pages/chatbot');
    }

    public function register(){
        return view('guest/pages/register');
    }

    public function add_opd(Request $request)
    {
        $valid = $request->validate(
            [
                'username' => ['required','unique:users'],
                'password' => ['required'],
                'email' => ['required','unique:users'],
                'name' => ['required'],
                'instansi' => ['required'],
            ]
        );

        // dd($request);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'name' => $request->name,
            'instansi' => $request->instansi,
        ]);

        $user->assignRole('user');

        if($user){
            return redirect('/')->with('success', 'User berhasil ditambahkan.');
        } else {
            return redirect('/')->with('error', 'User gagal ditambahkan.');
        }
    }
}
