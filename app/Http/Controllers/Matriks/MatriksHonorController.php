<?php

namespace App\Http\Controllers\Matriks;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Pegawai;
use App\Models\Master\Tim;
use App\Models\Matriks\MatriksHonor;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatriksHonorController extends Controller
{
    public function index()
    {
        // $data = MatriksHonor::select('*')
        //     ->orderBy('tahun', 'DESC') // nanti revisi ini
        //     ->orderBy('bulan', 'DESC') // nanti revisi ini
        //     ->get();

        $data = DB::table('matriks_honors_bast')->get();
        // dd(is_numeric('5.6') && strpos('5.6', '.') !== false);
        // dd(is_numeric(5.6) && strpos(5.6, '.') !== false);
        foreach ($data as $d) {
            if (is_numeric($d->no) && strpos($d->no, '.') !== false) {
                $d->no_bast = sprintf('%04d', $d->no) . '.' . explode('.', $d->no)[1];
            } else {
                $d->no_bast = sprintf('%04d', $d->no);
            }
            $matriks = MatriksHonor::find($d->matriks_honors_id);
            $d->keg = Kegiatan::find($matriks->kegiatans_id);
            $d->nama = $matriks->getNamaPetugas($d);
        }
        return view('matriks.honor.index', compact('data'));
        // yang diatas jangan lupa rapiin ges 
    }

    public function create(Request $request)
    {
        if (!($request->has('kegiatans_id'))) {
            return redirect()->route('kegiatan.index');
        }

        // mengambil data kegiatan
        $keg = Kegiatan::find($request->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);

        // mengambil data mak dan pjk
        $keg->mak = $keg->pok->getMak($keg->pok);
        $keg->pjk = Pegawai::find($keg->pjk);

        // mengambil data list petugas
        $sk = new Sk();
        $list_petugas = $sk->getListPetugas($keg->tahun);
        $sk = $sk->where('tahun', $keg->tahun)->get();

        return view('matriks.honor.create', compact('keg', 'sk', 'list_petugas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'kegiatans_id'   => 'required',
            'bulan'          => 'required',
            'sebagai'        => 'required',
            'harga'          => 'required',
            'volume'         => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['kegiatans_id'] = $request->kegiatans_id;
        $data['bulan'] = $request->bulan;
        $data['tahun'] = $request->tahun;
        $data['edited_by'] = session('user_id');

        // insert data
        $res =  MatriksHonor::create($data);
        $res->insertBast($res->id, $request->all());

        return redirect()->route('matriks.honor.index');
    }
}
