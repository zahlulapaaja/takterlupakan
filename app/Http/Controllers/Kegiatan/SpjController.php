<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Sk;
use App\Models\Kegiatan\Spj;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Pok;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Riskihajar\Terbilang\Facades\Terbilang;

class SpjController extends Controller
{
    public function index()
    {
        $data = Spj::orderBy('tgl_spj', 'DESC')->orderBy('no', 'DESC')->get();
        foreach ($data as $d) {
            $tgl = explode('-', $d->tgl_spj);
            $d->no_spj = $d->no . '/SPJ/BPS-1107/' . $tgl[0];
            $d->rincian = Str::limit($d->nama_kegiatan, 25);
        }
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

    public function print($id)
    {
        $data = Spj::find($id);
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $data->alokasi_beban = DB::table('spjs_alokasi_beban')->where('spjs_id', $id)->get();
        // $data->petugas = $data->getPetugas($id);

        // generate nomor surat
        $data->no_spj = $data->no . '/SPJ/BPS-1107/' . explode('-', $data->tgl_spj)[0];
        $data->pok = Pok::find($data->poks_id);
        $data->mak = '054.01.' . // bikin constants
            $data->pok->kode_program . '.' .
            $data->pok->kode_kegiatan . '.' .
            $data->pok->kode_output . '.' .
            $data->pok->kode_suboutput . '.' .
            $data->pok->kode_komponen . '.' .
            $data->pok->kode_subkomponen . '.' .
            $data->pok->kode_akun;

        // format tanggal data sk
        $tgl = new Carbon;
        // Config::set('terbilang.locale', 'id');
        $data->terbilang_tgl =
            $tgl->isoFormat('dddd', $data->tgl_spj)
            . ' Tanggal ' . Terbilang::make(explode('-', $data->tgl_spj)[2])
            . ' Bulan ' . Terbilang::make(explode('-', $data->tgl_spj)[1])
            . ' Tahun ' . Terbilang::make(explode('-', $data->tgl_spj)[0]);
        $data->tgl_spj = date_indo($data->tgl_spj);

        // $data->tgl_mulai = date_indo($data->tgl_mulai);
        // mengambil data pjk
        $data->pjk = Pegawai::find($data->pjk);
        // dd($data->pjk);

        // format tanggal data referensi
        $ref->tgl_dipa = date_indo($ref->tgl_dipa);
        $ref->tgl_sk_kpa = date_indo($ref->tgl_sk_kpa);

        // $views =
        //     view('kegiatan.spj._print.daftar-honor', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.bast', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.pernyataan', compact('data', 'ref'))->render();
        return view('kegiatan.spj.print', compact('data', 'ref'));
        // return $views;
    }
}
