<?php

namespace App\Http\Controllers;

use App\Models\Surat\NoFp;
use App\Models\Surat\NoSuratMasukKeluar;
use App\Models\Surat\NoSuratTim;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        return view('user-management.users');
    }

    public function users_view()
    {
        return view('user-management.users_view');
    }

    public function roles()
    {
        return view('user-management.roles');
    }

    public function roles_view()
    {
        return view('user-management.roles_view');
    }

    public function permissions()
    {
        return view('user-management.permissions');
    }

    public function soon()
    {
        return view('coming-soon');
    }

    public function no_surat()
    {
        $last_no['fp'] = NoFp::latest('no')->where('tahun', date("Y"))->first()->no;
        $last_no['masuk-keluar'] = NoSuratMasukKeluar::latest('no')->where('tahun', date("Y"))->first()->no;
        $last_no['tim'] = NoSuratTim::latest('no')->where('tahun', date("Y"))->first()->no;

        return view('no-surat.index', compact('last_no'));
    }

    public function master()
    {
        return view('master.index');
    }
}
