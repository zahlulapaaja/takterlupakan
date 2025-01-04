<?php

namespace App\Http\Controllers\Surat;

use App\Exports\Surat\NoSuratMasukKeluarExport;
use App\Http\Controllers\Controller;
use App\Models\Surat\NoSuratMasukKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class NoSuratMasukKeluarController extends Controller
{

    public function index(Request $request)
    {
        // cek data ajax
        if ($request->ajax()) {
            $data = NoSuratMasukKeluar::select()
                ->orderBy('tahun', 'DESC')
                ->orderBy('no', 'DESC');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenis', function ($row) {
                    if ($row->jenis == 'masuk') {
                        return '<div class="badge badge-light bg-green-300 fw-bold">' . $row->jenis . '</div>';
                    } else {
                        return '<div class="badge badge-light bg-blue-300 fw-bold">' . $row->jenis . '</div>';
                    }
                })
                ->addColumn('rincian', function ($row) {
                    if ($row->jenis == 'masuk') {
                        $m = DB::table('no_surat_masuks')->find($row->no_surat_masuks_id);
                        return Str::limit($m->rincian, 30);
                    } else {
                        $k = DB::table('no_surat_keluars')->find($row->no_surat_keluars_id);
                        return Str::limit($k->rincian, 30);
                    }
                })
                ->addColumn('tgl', function ($row) {
                    return date_indo($row->tgl);
                })
                ->addColumn('tgl', function ($row) {
                    return date_indo($row->tgl);
                })
                ->addColumn('action', function ($row) {
                    $route_show = route('no-surat.masuk-keluar.show', $row->id);
                    $route_edit = route('no-surat.masuk-keluar.edit', $row->id);
                    $result = '<div class="d-flex justify-content-end flex-shrink-0">
                                <a href="' . $route_show . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="ki-duotone ki-information fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </a>
                                <a href="' . $route_edit . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="ki-duotone ki-pencil fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a href="#" data-id="' . $row->id . '" data-name="' . $row->no . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </a>
                            </div>';

                    return $result;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('tahun') != 0) {
                        $instance->where('tahun', $request->get('tahun'));
                    }
                    if ($request->get('jenis') != 0) {
                        $instance->where('jenis', $request->get('jenis'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('jenis', 'LIKE', "%$search%")
                                ->orWhere('no', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['jenis', 'action'])
                ->make(true);
        }

        $tahun = NoSuratMasukKeluar::distinct()->orderBy('tahun', 'DESC')->get('tahun');
        return view('no-surat.masuk-keluar.index', compact('tahun'));
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

        $res = NoSuratMasukKeluar::create($data);
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
