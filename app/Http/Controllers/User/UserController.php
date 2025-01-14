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

        // membuat array nama roles 
        foreach ($users as $user) {
            $roles_name = [];
            foreach ($user->roles as $role) {
                array_push($roles_name, $role->name);
            }
            $user->roles_name = $roles_name;
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
            $filename   = date('YmdHis') . '_' . $avatar->getClientOriginalName();
            $path       = 'avatar-user/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($avatar));
            $data['image'] = $filename;
        }

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);
        $data['email_verified_at'] = date('Y-m-d H:i:s');

        // store data 
        $res = User::create($data);
        $res->assignRole([$request->role]);
        return redirect()->route('user-management.users.index');
    }

    public function update($id, Request $request)
    {
        $find = User::find($id);

        $validator = Validator::make($request->all(), [
            'avatar'    => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'email'     => 'required|email',
            'name'      => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // setor gambar avatar 
        if ($request->avatar) {
            $avatar     = $request->file('avatar');
            $filename   = date('YmdHis') . '_' . $avatar->getClientOriginalName();
            $path       = 'avatar-user/' . $filename;

            // hapus file yang udah ada 
            if ($find->image != 'blank.png') {
                Storage::disk('public')->delete('avatar-user/' . $find->image);
            }
            Storage::disk('public')->put($path, file_get_contents($avatar));
            $data['image'] = $filename;
        } elseif ($request->avatar_remove) {
            if ($find->image != 'blank.png') {
                Storage::disk('public')->delete('avatar-user/' . $find->image);
            }
            $data['image'] = 'blank.png';
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        // update data
        $find->update($data);
        DB::table('model_has_roles')->where('model_id', $find->id)->delete();
        $find->assignRole([$request->role]);

        return redirect()->route('user-management.users.index');
    }

    public function update_password($id, Request $request)
    {
        $find = User::find($id);

        $validator = Validator::make($request->all(), ['password'  => 'required',]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // update data
        $data['password'] = Hash::make($request->password);
        $find->update($data);

        return redirect()->route('user-management.users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            DB::table('model_has_roles')->where('model_id', '=', $user->id)->delete(); // soft delete
        }

        return response()->json(array('success' => true));
    }
}
