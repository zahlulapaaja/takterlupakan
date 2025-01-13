<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        return view('user-management.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar'    => 'mimes:png,jpg,jpeg|max:2048',
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // setor gambar avatar 
        if ($request->avatar) {
            $avatar     = $request->file('avatar');
            $filename   = date('Ymd') . '_' . $avatar->getClientOriginalName();
            $path       = 'avatar-user/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($avatar));
            $data['image'] = $filename;
        }

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);
        $data['email_verified_at'] = date('Y-m-d H:i:s');

        $res = User::create($data);
        $res->assignRole([$request->role]);
        return redirect()->route('user-management.users.index');
    }

    public function show($id)
    {
        $data = User::find($id);
        // $data['roles'] = $data->roles;

        return view('user-management.user_detail', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = User::find($id);
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name'  => 'required',
            // 'password'  => 'nullable',
            // 'avatar'    => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        // $avatar     = $request->file('avatar');

        // if ($avatar) {
        //     $filename   = date('Y-m-d') . $avatar->getClientOriginalName();
        //     $path       = 'avatar-user/' . $filename;

        //     if ($find->image) {
        //         Storage::disk('public')->delete('avatar-user/' . $find->image);
        //     }
        //     Storage::disk('public')->put($path, file_get_contents($avatar));

        //     $data['image'] = $filename;
        // }

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        // if ($request->password) {
        //     $data['password'] = Hash::make($request->password);
        // }

        // dd($data);

        $find->update($data);
        return redirect()->route('user-management.users.show', ['user' => $find->id]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            DB::table('model_has_roles')->where('model_id', '=', $user->id)->delete();
        }

        return response()->json(array('success' => true));
    }
}
