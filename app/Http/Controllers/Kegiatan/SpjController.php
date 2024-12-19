<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Pegawai;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SpjController extends Controller
{
    public function index()
    {
        // punya sk
        $data = Sk::all();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl_ditetapkan);
            $d->no_sk = $d->no . '/SK/BPS-1107/' . $tgl[0];
            $d->rincian = Str::limit($d->tentang, 25);
        }
        // punya sk
        return view('kegiatan.spj.index', compact('data'));
    }

    public function create(Request $request)
    {
        if (!($request->has('pok_id'))) {
            return redirect()->route('pok');
        }

        $pok = Pok::find($request->pok_id);
        $pok->mak = '054.01.' . // bikin constants
            $pok->kode_program . '.' .
            $pok->kode_kegiatan . '.' .
            $pok->kode_output . '.' .
            $pok->kode_suboutput . '.' .
            $pok->kode_komponen . '.' .
            $pok->kode_subkomponen . '.' .
            $pok->kode_akun;

        $sk = Sk::all();
        $list_petugas = [];
        $last_no = Spj::where('tahun', $pok->tahun)->max('no');
        $list_pegawai = Pegawai::all();

        return view('kegiatan.spj.create', compact('pok', 'sk', 'list_pegawai', 'last_no', 'list_petugas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no'             => 'required',
            'nama_kegiatan'  => 'required',
            'tgl_mulai'      => 'required',
            'tgl_akhir'      => 'required',
            'tgl_spj'        => 'required',
            'pjk'            => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $spj['poks_id'] = $request->poks_id;
        $spj['no'] = $request->no;
        $spj['nama_kegiatan'] = $request->nama_kegiatan;
        $spj['tgl_mulai'] = $request->tgl_mulai;
        $spj['tgl_akhir'] = $request->tgl_akhir;
        $spj['tgl_spj'] = $request->tgl_spj;
        $spj['pjk'] = $request->pjk;
        $spj['tahun'] = $request->tahun;

        // insert data
        $res_spj =  Spj::create($spj);
        $res_spj->insertAlokasiBeban($res_spj->id, $request->all());

        return redirect()->route('kegiatan.spj.index');
    }
}
