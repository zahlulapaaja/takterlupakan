<?php

namespace App\Http\Controllers\Surat;

use App\Exports\Surat\NoSuratTimExport;
use App\Http\Controllers\Controller;
use App\Models\Master\Tim;
use App\Models\Surat\NoSuratTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class NoSuratTimController extends Controller
{
    public function index(Request $request)
    {
        // cek data ajax
        if ($request->ajax()) {
            $data = NoSuratTim::select()
                ->orderBy('tahun', 'DESC')
                ->orderBy('tgl', 'DESC')
                ->orderBy('no', 'DESC');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('no_surat', function ($row) {
                    $tgl = explode('-', $row->tgl);
                    return 'B-' . $row->no . '/' . $row->jenis . '/' . $tgl[1] . '/' . $tgl[0];
                })
                ->addColumn('rincian', function ($row) {
                    return Str::limit($row->rincian, 30);
                })
                ->addColumn('tgl', function ($row) {
                    return date_indo($row->tgl);
                })
                ->addColumn('action', function ($row) {
                    $tgl = explode('-', $row->tgl);
                    $no_surat = 'B-' . $row->no . '/' . $row->jenis . '/' . $tgl[1] . '/' . $tgl[0];
                    $route_show = route('no-surat.tim.show', $row->id);
                    $route_edit = route('no-surat.tim.edit', $row->id);
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
                                        <a href="#" data-id="' . $row->id . '" data-name="' . $no_surat . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
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
                    if ($request->get('tim') != 0) {
                        $instance->where('tim', $request->get('tim'));
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
                ->rawColumns(['action'])
                ->make(true);
        }

        $tahun = Tim::distinct()->orderBy('tahun', 'DESC')->get('tahun');
        return view('no-surat.tim.index', compact('tahun'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tim'       => 'required|numeric',
            'jenis'     => 'required',
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['tim'] = $request->tim;
        $data['jenis'] = $request->jenis;
        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['keterangan'] = $request->keterangan;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $res = NoSuratTim::create($data);
        return redirect()->route('no-surat.tim.index')->with('success', 'Nomor Surat berhasil ditambah');
    }

    public function show($id)
    {
        $data = NoSuratTim::find($id);
        $data->tim = Tim::find($data->tim);
        return view('no-surat.tim.show', compact('data'));
    }

    public function edit($id)
    {
        $data = NoSuratTim::find($id);
        $data->tim = Tim::find($data->tim);
        $list_tahun = Tim::distinct()->get('tahun');
        return view('no-surat.tim.edit', compact('data', 'list_tahun'));
    }

    public function update($id, Request $request)
    {
        $find = NoSuratTim::find($id);
        $validator = Validator::make($request->all(), [
            'tim'       => 'required|numeric',
            'jenis'     => 'required',
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['tim'] = $request->tim;
        $data['jenis'] = $request->jenis;
        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['keterangan'] = $request->keterangan;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $find->update($data);
        return redirect()->route('no-surat.tim.index')->with('success', 'Nomor Surat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = NoSuratTim::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function export($tahun)
    {
        return (new NoSuratTimExport($tahun))->download('no-surat-tim-' . $tahun . '.xlsx');
    }
}
