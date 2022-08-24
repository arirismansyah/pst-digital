<?php

namespace App\Http\Controllers;

use App\Models\Subjectmatter;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //

    public function home()
    {
        return view('admin/pages/home');
    }

    public function conference()
    {
        return view('admin/pages/conference');
    }

    public function users()
    {
        $data_users = User::paginate(10);
        $data_fungsi = Subjectmatter::all();
        $data_roles = Role::all();
        return view('admin/pages/users', compact('data_users', 'data_fungsi', 'data_roles'));
    }

    public function add_user(Request $request)
    {
        $valid = $request->validate(
            [
                'username' => ['required','unique:users'],
                'password' => ['required'],
                'email' => ['required','unique:users'],
                'name' => ['required'],
                'fungsi' => ['required'],
                'role' => ['required'],
            ]
        );

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'name' => $request->name,
            'fungsi' => $request->fungsi,
        ]);

        $user->assignRole($request->role);

        if($user){
            return redirect()->back()->with('success', 'User berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'User gagal ditambahkan.');
        }
    }

    public function edit_user(Request $request)
    {
        $valid = $request->validate(
            [
                'username' => ['required',],
                'id' => ['required'],
                'name' => ['required'],
                'fungsi' => ['required'],
                'role' => ['required'],
            ]
        );

        $user = User::find($request->id);
        $affectedRows = $user->update(array(
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name,
            'fungsi' => $request->fungsi,
        ));

        $user->assignRole($request->role);

        if($affectedRows){
            return redirect()->back()->with('success', 'User berhasil diedit.');
        } else {
            return redirect()->back()->with('error', 'User gagal diedit.');
        }
    }

    public function delete_user(Request $request){
        $valid = $request->validate(
            [
                'id' => ['required'],
            ]
        );

        $affectedRows = User::where('id', $request->id)->delete();

        if ($affectedRows>0) {
            return redirect()->back()->with('success', 'User berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'User gagal dihapus.');
        }
    }

    public function edit_role_user(Request $request){
        $valid = $request->validate(
            [
                'id' => ['required'],
                'role' => ['required'],
            ]
        );

        $user = User::find($request->id);
        $result = $user->syncRoles([$request->role]);
        if ($result) {
            return redirect()->back()->with('success', 'Role berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Role gagal diperbaharui.');
        }
    }


    // ROLES
    public function roles()
    {
        $data_roles = Role::paginate(10);
        return view('admin/pages/roles', compact('data_roles'));
    }

    public function add_role(Request $request){
        $valid = $request->validate([
            'name'=>['required'],
            'guard_name'=>['required'],
        ]);

        $role = Role::create([
            'name'=>$request->name,
            'guard_name'=>$request->guard_name,
        ]);

        if ($role) {
            return redirect()->back()->with('success', 'Role berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Role gagal ditambahkan.');
        }
    }

    public function edit_role(Request $request){
        $valid = $request->validate([
            'id'=>['required'],
            'name'=>['required'],
            'guard_name'=>['required'],
        ]);

        $affectedRows = Role::find($request->id)->update(array('name'=>$request->name, 'guard_name'=>$request->guard_name));

        if ($affectedRows>0) {
            return redirect()->back()->with('success', 'Role berhasil diperbaharui.');
        } else {
            return redirect()->back()->with('error', 'Role gagal diperbaharui.');
        }

    }

    public function delete_role(Request $request){
        $valid = $request->validate([
            'id'=>['required'],
        ]);

        $affectedRows = Role::find($request->id)->delete();
        if ($affectedRows>0) {
            return redirect()->back()->with('success', 'Role berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Role gagal dihapus.');
        }
    }
}
