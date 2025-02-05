<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Imports\MitraImport;
use App\Models\Master\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        $data = Mitra::distinct()->get('tahun');
        return view('master.mitra.index', compact('data'));
    }

    public function list($tahun)
    {
        $data = Mitra::where('tahun', $tahun)->get();
        $data->tahun = $tahun;

        return view('master.mitra.list', compact('data'));
    }

    public function impor()
    {
        // mengambil tahun terakhir
        $last_tahun = Mitra::max('tahun');
        if ($last_tahun == null) {
            $last_tahun = explode('-', now())[0];
        } else {
            $last_tahun++;
        }

        return view('master.mitra.impor', compact('last_tahun'));
    }

    public function proses_impor(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // inisiasi data session
        session(['tahun' => $request->tahun,]);

        // import file
        Excel::import(new MitraImport, $request->file('file'));

        // hapus data session
        session()->pull('tahun');

        // redirect kembali
        return redirect()->route('master.mitra.index')->with('success', 'Data mitra berhasil di import');
    }

    public function show($id)
    {
        $data = Mitra::find($id);
        $data->agama_desc = $data->getAgamaDesc($data->agama);
        $data->status_desc = $data->getStatusDesc($data->status);
        $data->jk_desc = $data->getJkDesc($data->jk);

        return view('master.mitra.detail', compact('data'));
    }

    public function add($tahun)
    {
        $tahun = $tahun;
        return view('master.mitra.add', compact('tahun'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'posisi'        => 'required',
            'id_sobat'      => 'required',
            'email'         => 'required|email',
            'alamat_detail' => 'required',
            'alamat_prov'   => 'required',
            'alamat_kab'    => 'required',
            'alamat_kec'    => 'required',
            'jk'            => 'required',
            'nama_bank'     => 'required',
            'no_rek'        => 'required',
            'an_rek'        => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // setor ke variabel data
        $data['nama'] = $request->nama;
        $data['posisi'] = $request->posisi;
        $data['id_sobat'] = $request->id_sobat;
        $data['email'] = $request->email;
        $data['alamat_detail'] = $request->alamat_detail;
        $data['alamat_prov'] = $request->alamat_prov;
        $data['alamat_kab'] = $request->alamat_kab;
        $data['alamat_kec'] = $request->alamat_kec;
        $data['alamat_desa'] = $request->alamat_desa;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['jk'] = $request->jk;
        $data['agama'] = $request->agama;
        $data['status'] = $request->status;
        $data['pendidikan'] = $request->pendidikan;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['no_telp'] = $request->no_telp;
        $data['npwp'] = $request->npwp;
        $data['nama_bank'] = $request->nama_bank;
        $data['no_rek'] = $request->no_rek;
        $data['an_rek'] = $request->an_rek;
        $data['catatan'] = $request->catatan;
        $data['tahun'] = $request->tahun;

        Mitra::create($data);
        return redirect()->route('master.mitra.list', $request->tahun)->with('success', 'Data mitra berhasil ditambah');
    }

    public function edit($id)
    {
        $data = Mitra::find($id);
        $data->agama_desc = $data->getAgamaDesc($data->agama);
        $data->status_desc = $data->getStatusDesc($data->status);
        $data->jk_desc = $data->getJkDesc($data->jk);

        return view('master.mitra.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = Mitra::find($id);
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'posisi'        => 'required',
            'id_sobat'      => 'required',
            'email'         => 'required|email',
            'alamat_detail' => 'required',
            'alamat_prov'   => 'required',
            'alamat_kab'    => 'required',
            'alamat_kec'    => 'required',
            'tgl_lahir'     => 'required',
            'jk'            => 'required',
            'agama'         => 'required',
            'status'        => 'required',
            'pendidikan'    => 'required',
            'pekerjaan'     => 'required',
            'no_telp'       => 'required',
            'npwp'          => 'nullable',
            'nama_bank'     => 'required',
            'no_rek'        => 'required',
            'an_rek'        => 'required',
            'catatan'       => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // setor ke variabel data
        $data['nama'] = $request->nama;
        $data['posisi'] = $request->posisi;
        $data['id_sobat'] = $request->id_sobat;
        $data['email'] = $request->email;
        $data['alamat_detail'] = $request->alamat_detail;
        $data['alamat_prov'] = $request->alamat_prov;
        $data['alamat_kab'] = $request->alamat_kab;
        $data['alamat_kec'] = $request->alamat_kec;
        $data['alamat_desa'] = $request->alamat_desa;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['jk'] = $request->jk;
        $data['agama'] = $request->agama;
        $data['status'] = $request->status;
        $data['pendidikan'] = $request->pendidikan;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['no_telp'] = $request->no_telp;
        $data['npwp'] = $request->npwp;
        $data['nama_bank'] = $request->nama_bank;
        $data['no_rek'] = $request->no_rek;
        $data['an_rek'] = $request->an_rek;
        $data['catatan'] = $request->catatan;

        $find->update($data);
        return redirect()->route('master.mitra.list', $find->tahun)->with('success', 'Data mitra berhasil diupdate');
    }

    public function destroy($id, Request $request)
    {
        $data = Mitra::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function delete($tahun)
    {
        // hapus semua data per tahun
        $data = Mitra::where('tahun', $tahun)
            ->delete();

        return response()->json(array('success' => true));
    }

    public function template()
    {
        $file = public_path() . "/templates/template_mitra.xlsx";
        return Response::download($file, 'template-mitra.xlsx');
    }
}
