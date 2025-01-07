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

        $no['fp'] = NoFp::latest('no')->where('tahun', date("Y"))->first();
        $no['masuk-keluar'] = NoSuratMasukKeluar::latest('no')->where('tahun', date("Y"))->first();
        $no['tim'] = NoSuratTim::latest('no')->where('tahun', date("Y"))->first();

        // kondisi jika data kosong
        $last_no['fp'] = $last_no['masuk-keluar'] = $last_no['tim'] = '000';
        if ($no['fp']) $last_no['fp'] = $no['fp']->no;
        if ($no['masuk-keluar']) $last_no['masuk-keluar'] = $no['masuk-keluar']->no;
        if ($no['tim']) $last_no['tim'] = $no['tim']->no;

        return view('no-surat.index', compact('last_no'));
    }

    public function master()
    {
        return view('master.index');
    }

    public function matriks()
    {
        return 'matriks.index';
    }
}
