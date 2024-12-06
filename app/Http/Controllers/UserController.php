<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        foreach ($users as $user) {
            $user['roles'] = $user->roles;
        }
        $roles = Roles::all();
        return view('user-management.users', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'avatar'    => 'mimes:png,jpg,jpeg|max:2048',
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // $avatar     = $request->file('avatar');
        // $filename   = date('Y-m-d') . $avatar->getClientOriginalName();
        // $path       = 'avatar-user/' . $filename;

        // Storage::disk('public')->put($path, file_get_contents($avatar));


        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);
        // $data['email_verified_at'] = date('Y-m-d H:i:s');
        // $data['image'] = $filename;



        $res = User::create($data);
        $res->assignRole([$request->role]);
        return redirect()->route('user-management.users.index');
    }
}
