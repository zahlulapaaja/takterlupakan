<?php

namespace App\Http\Controllers\Surat;

use App\Exports\Surat\NoSuratMasukKeluarExport;
use App\Http\Controllers\Controller;
use App\Models\Surat\NoSuratMasukKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NoSuratMasukKeluarController extends Controller
{
    public function index()
    {
        $last_tahun = NoSuratMasukKeluar::max('tahun');
        $data = NoSuratMasukKeluar::where('tahun', $last_tahun)->get();

        foreach ($data as $d) {
            if ($d->jenis == 'masuk') {
                $m = DB::table('no_surat_masuks')->find($d->no_surat_masuks_id);
                $d->rincian = $m->rincian;
            } else {
                $k = DB::table('no_surat_keluars')->find($d->no_surat_keluars_id);
                $d->rincian = $k->rincian;
            }
        }

        $list_tahun = NoSuratMasukKeluar::distinct()->orderBy('tahun', 'DESC')->get('tahun');

        return view('no-surat.masuk-keluar.index', compact('data', 'list_tahun', 'last_tahun'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'jenis'     => 'required',
            'tgl'       => 'required|date',
            'rincian'   => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        if ($request->jenis == 'masuk') {
            $masuk['pengirim'] = $request->pengirim;
            $masuk['no_masuk'] = $request->no_masuk;
            $masuk['tgl_surat'] = $request->tgl_surat;
            $masuk['rincian'] = $request->rincian;
            $masuk['keterangan'] = $request->keterangan;

            // insert ke database
            DB::table('no_surat_masuks')->insert($masuk);
            $res = DB::table('no_surat_masuks')->latest('id')->first();

            $data['no_surat_masuks_id'] = $res->id;
        } else if ($request->jenis == 'keluar') {
            $keluar['rincian'] = $request->rincian;
            $keluar['tujuan'] = $request->tujuan;
            $keluar['keterangan'] = $request->keterangan;

            // insert ke database
            DB::table('no_surat_keluars')->insert($keluar);
            $res = DB::table('no_surat_keluars')->latest('id')->first();

            $data['no_surat_keluars_id'] = $res->id;
        }

        $data['no'] = $request->no;
        $data['jenis'] = $request->jenis;
        $data['tgl'] = $request->tgl;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        NoSuratMasukKeluar::create($data);
        return redirect()->route('no-surat.masuk-keluar.index')->with('success', 'Nomor Surat berhasil ditambah');
    }

    public function show($id)
    {
        $data = NoSuratMasukKeluar::find($id);
        if ($data->jenis == 'masuk') {
            $m = DB::table('no_surat_masuks')->find($data->no_surat_masuks_id);
            $data->detail = $m;
        } else {
            $k = DB::table('no_surat_keluars')->find($data->no_surat_keluars_id);
            $data->detail = $k;
        }

        return view('no-surat.masuk-keluar.show', compact('data'));
    }

    public function edit($id)
    {
        $data = NoSuratMasukKeluar::find($id);
        if ($data->jenis == 'masuk') {
            $m = DB::table('no_surat_masuks')->find($data->no_surat_masuks_id);
            $data->detail = $m;
        } else {
            $k = DB::table('no_surat_keluars')->find($data->no_surat_keluars_id);
            $data->detail = $k;
        }

        return view('no-surat.masuk-keluar.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = NoSuratMasukKeluar::find($id);
        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'jenis'     => 'required',
            'tgl'       => 'required|date',
            'rincian'   => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        if ($request->jenis == 'masuk') {
            DB::table('no_surat_masuks')->find($find->no_surat_masuks_id);

            $masuk['pengirim'] = $request->pengirim;
            $masuk['no_masuk'] = $request->no_masuk;
            $masuk['tgl_surat'] = $request->tgl_surat;
            $masuk['rincian'] = $request->rincian;
            $masuk['keterangan'] = $request->keterangan;

            // update database
            DB::table('no_surat_masuks')
                ->where('id', $find->no_surat_masuks_id)
                ->update($masuk);
        } else if ($request->jenis == 'keluar') {
            DB::table('no_surat_keluars')->find($find->no_surat_keluars_id);

            $keluar['rincian'] = $request->rincian;
            $keluar['tujuan'] = $request->tujuan;
            $keluar['keterangan'] = $request->keterangan;

            // update database
            DB::table('no_surat_keluars')
                ->where('id', $find->no_surat_keluars_id)
                ->update($keluar);
        }

        $data['no'] = $request->no;
        $data['jenis'] = $request->jenis;
        $data['tgl'] = $request->tgl;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $find->update($data);
        return redirect()->route('no-surat.masuk-keluar.index')->with('success', 'Nomor Surat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = NoSuratMasukKeluar::find($id);
        if ($data->jenis == 'masuk') {
            DB::table('no_surat_masuks')
                ->where('id', $data->no_surat_masuks_id)
                ->delete();
        } else if ($data->jenis == 'keluar') {
            DB::table('no_surat_keluars')
                ->where('id', $data->no_surat_keluars_id)
                ->delete();
        }

        $data->delete();
        return response()->json(array('success' => true));
    }

    public function export($tahun)
    {
        return (new NoSuratMasukKeluarExport($tahun))->download('no-surat-masuk-keluar-' . $tahun . '.xlsx');
    }
}
