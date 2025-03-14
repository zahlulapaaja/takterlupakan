<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Master\Pegawai;
use App\Models\Master\Tim;
use App\Models\Pok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function index()
    {
        $data = Kegiatan::select('id', 'poks_id', 'nama', 'tim', 'tahun')
            ->orderBy('tahun', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($data as $d) {
            $pok = Pok::find($d->poks_id);
            $d->mak = $pok->getMak($pok);
            $d->kode_akun = $pok->kode_akun;

            $d->tim = Tim::find($d->tim);
        }
        $list_tahun = Kegiatan::distinct()->get('tahun');

        return view('kegiatan.index', compact('data', 'list_tahun'));
    }

    public function create(Request $request)
    {
        $pok = Pok::find($request->poks_id);

        if ($request->has('poks_id')) {
            $pegawai = Pegawai::all();
            $tim = Tim::where('tahun', $pok->tahun)->get();
            return view('kegiatan.create', compact('pok', 'pegawai', 'tim'));
        } else {
            return redirect()->route('pok.index');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'poks_id'        => 'required',
            'nama'           => 'required',
            'tgl_mulai'      => 'required',
            'tgl_akhir'      => 'required',
            'tim'            => 'required',
            'pjk'            => 'required',
            'tahun'          => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $keg['poks_id'] = $request->poks_id;
        $keg['nama'] = $request->nama;
        $keg['tgl_mulai'] = $request->tgl_mulai;
        $keg['tgl_akhir'] = $request->tgl_akhir;
        $keg['tim'] = $request->tim;
        $keg['pjk'] = $request->pjk;
        $keg['tahun'] = $request->tahun;
        $keg['edited_by'] = session('user_id');

        // insert data
        $res = Kegiatan::create($keg);

        return redirect()->route('kegiatan.index');
    }

    public function edit($id)
    {
        // mengambil data
        $data = Kegiatan::find($id);
        $data->tim = Tim::find($data->tim);
        $data->pjk = Pegawai::find($data->pjk);
        $pok = Pok::find($data->poks_id);
        $pegawai = Pegawai::all();
        $tim = Tim::where('tahun', $pok->tahun)->get();

        return view('kegiatan.edit', compact('data', 'pok', 'pegawai', 'tim'));
    }

    public function update($id, Request $request)
    {
        $find = Kegiatan::find($id);
        $validator = Validator::make($request->all(), [
            'poks_id'        => 'required',
            'nama'           => 'required',
            'tgl_mulai'      => 'required',
            'tgl_akhir'      => 'required',
            'tim'            => 'required',
            'pjk'            => 'required',
            'tahun'          => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $keg['poks_id'] = $request->poks_id;
        $keg['nama'] = $request->nama;
        $keg['tgl_mulai'] = $request->tgl_mulai;
        $keg['tgl_akhir'] = $request->tgl_akhir;
        $keg['tim'] = $request->tim;
        $keg['pjk'] = $request->pjk;
        $keg['tahun'] = $request->tahun;
        $keg['edited_by'] = session('user_id');

        // update data
        $find->update($keg);

        return redirect()->route('kegiatan.index');
    }

    public function destroy($id)
    {
        $data = Kegiatan::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }
}
