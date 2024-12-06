<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->ajax());
        // if ($request->ajax()) {
        //     $users = User::query();

        //     return DataTables::eloquent($users)
        //         ->addColumn('created_at', function ($user) {
        //             return Carbon::parse($user->created_at)->format('Y-m-d');
        //         })
        //         ->make(true);
        // }

        // return view('user-management.users');
        $users = User::all();
        foreach ($users as $user) {
            $user['roles'] = $user->roles;
        }
        return view('user-management.users', compact('users'));
    }
}
