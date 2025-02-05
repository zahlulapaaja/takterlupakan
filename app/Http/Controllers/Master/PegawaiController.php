<?php

namespace App\Http\Controllers\Master;

use App\Exports\PegawaiExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Pegawai;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $data = Pegawai::all();
        foreach ($data as $p) {
            $p->avatar = 'pegawai/' . $p->avatar;
        }

        return view('master.pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('master.pegawai.create');
    }

    public function store(Request $request)
    {
        // validasi input
        $validator = Validator::make($request->all(), [
            'avatar'    => 'nullable|mimes:png,jpg,jpeg',
            'nama'      => 'required',
            'jabatan'   => 'required',
            'nip_baru'  => 'required|min:16',
            'nip_lama'  => 'required|min:9',
            'golongan'  => 'required',
            'pangkat'   => 'required',
            'email'     => 'required|email',
            'no_hp'     => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // store data gambar dan ambil nama filenya 
        $avatar     = $request->file('avatar');
        if ($avatar) {
            $filename   = date('YmdHis') . '_' . $avatar->getClientOriginalName();
            $path       = 'pegawai/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($avatar));
            $data['avatar'] = $filename;
        } else {
            $data['avatar'] = 'blank.png';
        }

        $data['nama'] = $request->nama;
        $data['jabatan'] = $request->jabatan;
        $data['nip_baru'] = $request->nip_baru;
        $data['nip_lama'] = $request->nip_lama;
        $data['golongan'] = $request->golongan;
        $data['pangkat'] = $request->pangkat;
        $data['email'] = $request->email;
        $data['no_hp'] = $request->no_hp;
        $data['nama_bank'] = $request->nama_bank;
        $data['no_rek'] = $request->no_rek;
        $data['an_rek'] = $request->an_rek;
        $data['catatan'] = $request->catatan;

        Pegawai::create($data);
        return redirect()->route('master.pegawai.index')->with('success', 'Data pegawai berhasil ditambah');
    }

    public function show($id)
    {
        $data = Pegawai::find($id);
        $data->avatar = 'pegawai/' . $data->avatar;

        return view('master.pegawai.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Pegawai::find($id);
        $data->avatar = 'pegawai/' . $data->avatar;

        return view('master.pegawai.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $find = Pegawai::find($id);
        // dd($find);
        $validator = Validator::make($request->all(), [
            'avatar'    => 'nullable|mimes:png,jpg,jpeg',
            'nama'      => 'required',
            'jabatan'   => 'required',
            'nip_baru'  => 'required|min:16',
            'nip_lama'  => 'required|min:9',
            'golongan'  => 'required',
            'pangkat'   => 'required',
            'email'     => 'required|email',
            'no_hp'     => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // setor file dan hapus file yang ada 
        $avatar     = $request->file('avatar');
        if ($avatar) {
            $filename   = date('YmdHis') . '_' . $avatar->getClientOriginalName();
            $path       = 'pegawai/' . $filename;

            if ($find->avatar) Storage::disk('public')->delete('pegawai/' . $find->avatar);
            Storage::disk('public')->put($path, file_get_contents($avatar));

            $data['avatar'] = $filename;
        }

        $data['nama'] = $request->nama;
        $data['jabatan'] = $request->jabatan;
        $data['nip_baru'] = $request->nip_baru;
        $data['nip_lama'] = $request->nip_lama;
        $data['golongan'] = $request->golongan;
        $data['pangkat'] = $request->pangkat;
        $data['email'] = $request->email;
        $data['no_hp'] = $request->no_hp;
        $data['nama_bank'] = $request->nama_bank;
        $data['no_rek'] = $request->no_rek;
        $data['an_rek'] = $request->an_rek;
        $data['catatan'] = $request->catatan;

        $find->update($data);
        return redirect()->route('master.pegawai.index')->with('success', 'Data pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        // hapus data jika ada 
        $data = Pegawai::find($id);
        if ($data) $data->delete(); // soft delete

        return response()->json(array('success' => true));
    }

    public function export()
    {
        return (new PegawaiExport())->download('pegawai-1107.xlsx');
    }
}
