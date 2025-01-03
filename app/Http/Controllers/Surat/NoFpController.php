<?php

namespace App\Http\Controllers\Surat;

use App\Exports\Surat\NoFpExport;
use App\Http\Controllers\Controller;
use App\Models\Surat\NoFp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class NoFpController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = NoFp::select()
                ->orderBy('tahun', 'DESC')
                ->orderBy('no', 'DESC');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('no_surat', function ($row) {
                    $tgl = explode('-', $row->tgl);
                    return 'B-' . $row->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
                })
                ->addColumn('rincian', function ($row) {
                    return Str::limit($row->rincian, 30);
                })
                ->addColumn('tgl', function ($row) {
                    return date_indo($row->tgl);
                })
                ->addColumn('action', function ($row) {
                    $tgl = explode('-', $row->tgl);
                    $no_surat = 'B-' . $row->no . 'A/92800/KU.600/' . $tgl[1] . '/' . $tgl[0];
                    $route_edit = route('no-surat.fp.edit', $row->id);
                    $result = '<div class="d-flex justify-content-end flex-shrink-0">
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
                    if ($request->get('tahun')) {
                        $instance->where('tahun', $request->get('tahun'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('rincian', 'LIKE', "%$search%")
                                ->orWhere('no', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // mengambil data tahun
        $tahun = NoFp::distinct()->get('tahun');

        return view('no-surat.fp.index', compact('tahun'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $res = NoFp::create($data);
        return redirect()->route('no-surat.fp.index');
    }

    public function edit($id)
    {
        $data = NoFp::find($id);
        return view('no-surat.fp.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = NoFp::find($id);

        $validator = Validator::make($request->all(), [
            'no'        => 'required',
            'rincian'   => 'required',
            'tgl'       => 'required|date',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no'] = $request->no;
        $data['rincian'] = $request->rincian;
        $data['tgl'] = $request->tgl;
        $data['tahun'] = explode('-', $request->tgl)[0];
        $data['edited_by'] = session('user_id');

        $find->update($data);
        return redirect()->route('no-surat.fp.index');
    }

    public function destroy($id)
    {
        $data = NoFp::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function export($tahun)
    {
        return (new NoFpExport($tahun))->download('no-surat-fp-' . $tahun . '.xlsx');
    }
}
