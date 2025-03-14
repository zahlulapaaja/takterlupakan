<?php

namespace App\Http\Controllers\Matriks;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Matriks\MatriksHonor;
use App\Models\Pok;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatriksHonorController extends Controller
{
    public function index()
    {
        $data = MatriksHonor::select('tahun', 'bulan')
            ->groupBy('tahun')->groupBy('bulan')
            ->orderBy('tahun', 'DESC')
            ->orderBy('bulan', 'DESC')
            ->get();

        foreach ($data as $d) {
            $d->jumlah = MatriksHonor::distinct()
                ->where('tahun', $d->tahun)
                ->where('bulan', $d->bulan)
                ->get('mitra_id')->count();
        }

        return view('matriks.honor.index', compact('data'));
    }

    public function list($tahun, $bulan)
    {
        $data = MatriksHonor::select('matriks_honors.*', 'kegiatans.nama as nama_keg', 'tims.singkatan as nama_tim')
            ->join('kegiatans', 'matriks_honors.kegiatans_id', '=', 'kegiatans.id')
            ->join('tims', 'kegiatans.tim', '=', 'tims.id')
            ->where('matriks_honors.tahun', $tahun)
            ->where('matriks_honors.bulan', $bulan)
            ->get();

        foreach ($data as $d) {
            if (is_numeric($d->no_bast) && strpos($d->no_bast, '.') !== false) {
                $d->no_bast = sprintf('%04d', $d->no_bast) . '.' . explode('.', $d->no_bast)[1];
            } else {
                $d->no_bast = sprintf('%04d', $d->no_bast);
            }
            $d->nama = $d->getNamaPetugas($d);
            $d->honor_akumulasi = $d->getHonorAkumulasi($d->mitra_id, $d->tahun, $d->bulan);
        }

        $list_tim = MatriksHonor::distinct()
            ->join('kegiatans', 'matriks_honors.kegiatans_id', '=', 'kegiatans.id')
            ->join('tims', 'kegiatans.tim', '=', 'tims.id')
            ->where('matriks_honors.tahun', $tahun)
            ->where('matriks_honors.bulan', $bulan)
            ->get('tims.singkatan');

        return view('matriks.honor.list', compact('data', 'tahun', 'bulan', 'list_tim'));
    }

    public function create(Request $request)
    {
        if (!($request->has('kegiatans_id'))) {
            return redirect()->route('kegiatan.index');
        }

        // mengambil data kegiatan
        $keg = Kegiatan::find($request->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);

        // membuat data list bulan
        $start = explode('-', $keg->tgl_mulai)[1];
        $end = explode('-', $keg->tgl_akhir)[1];
        $keg->bulan = range($start, $end);

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
        $validator = Validator::make($request->all(), [
            'kegiatans_id'   => 'required',
            'bulan'          => 'required',
            'sebagai'        => 'required',
            'harga'          => 'required',
            'volume'         => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // insert data
        $matriks = new MatriksHonor();
        $matriks->insertData($request->all());

        return redirect()->route('matriks.honor.index');
    }

    public function update($id, Request $request)
    {
        $find = MatriksHonor::find($id);

        $validator = Validator::make($request->all(), [
            'no_bast'      => 'required',
            'sebagai'      => 'required',
            'harga'        => 'required',
            'volume'       => 'required',
            'tgl_bast'     => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['no_bast'] = $request->no_bast;
        $data['sebagai'] = $request->sebagai;
        $data['harga'] = $request->harga;
        $data['volume'] = $request->volume;
        $data['tgl_bast'] = $request->tgl_bast;

        // data redirect
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // update data
        $find->update($data);
        return redirect()->route('matriks.honor.list', [$tahun, $bulan])->with('success', 'Matriks Honor berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = MatriksHonor::find($id);
        $data->delete();

        return response()->json(array('success' => true));
    }

    public function bast_print($id)
    {
        // mengambil data 
        $data = MatriksHonor::find($id);
        $data->keg = Kegiatan::find($data->kegiatans_id);
        $data->satuan = Pok::find($data->keg->poks_id)->first()->satuan;
        $ref = Referensi::where('tahun', $data->tahun)->first();
        $data->keg->pjk = Pegawai::find($data->keg->pjk);

        // mengambil data petugas 
        $data->nama = $data->getNamaPetugas($data);
        $data->nip = $data->getNipPetugas($data);

        // generate nomor surat
        $data->no_bast = $data->getNoBast($data);

        // mengambil tanggal surat (masuk ke referensi)
        $tgl = $data->tgl_bast;
        $ref->terbilang_tgl = $ref->terbilang_tgl($tgl);

        return view('matriks.honor._print.bast', compact('data', 'ref'));
    }

    public function bast_list_print($tahun, $bulan)
    {
        // mengambil data
        $data = MatriksHonor::where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->orderByRaw('CAST(no_bast AS UNSIGNED) ASC')
            ->get();

        // mengambil data referensi
        $ref = Referensi::where('tahun', $tahun)->first();

        // melakukan looping data
        foreach ($data as $d) {
            // kalo ada matriks honor yang udh dibuat dan kegiatannya dihapus, akan error disini
            $d->keg = Kegiatan::find($d->kegiatans_id);
            $d->satuan = Pok::find($d->keg->poks_id)->first()->satuan;
            $d->keg->pjk = Pegawai::find($d->keg->pjk);

            // mengambil data petugas 
            $d->nama = $d->getNamaPetugas($d);
            $d->nip = $d->getNipPetugas($d);

            // generate nomor surat
            $d->no_bast = $d->getNoBast($d);

            // mengambil tanggal surat (masuk ke referensi)
            $tgl = $d->tgl_bast;
            $d->terbilang_tgl = $ref->terbilang_tgl($tgl);
        }

        return view('matriks.honor._print.bast_list', compact('data', 'ref'));
    }

    public function spk_print($tahun, $bulan, $no)
    {
        // mengambil data (asumsi datanya cuma mitra), urut by nama mitra
        $data = MatriksHonor::select('*')
            ->where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->orderBy(
                Mitra::select('nama')
                    ->whereColumn('mitras.id', 'matriks_honors.mitra_id'),
                'ASC'
            )
            ->groupBy('mitra_id')
            ->get();

        foreach ($data as $d) {
            // mengambil data petugas 
            if ($d->status == config('constants.MITRA')) {
                $d->petugas = Mitra::find($d->mitra_id);
                $d->petugas->kecamatan = $d->petugas->getKecDesc($d->petugas->alamat_kec);
            } elseif ($d->status == config('constants.PEGAWAI')) {
                $d->petugas = Pegawai::find($d->pegawai_id);
                $d->petugas->kecamatan = "Johan Pahlawan";
            }

            // generate nomor surat
            $d->no_spk = $d->getNoSpk($no++, $tahun, $bulan);

            // mengambil data kegiatan setiap mitra
            $d->honor = $d->getDataHonor($d->mitra_id, $tahun, $bulan);
            $d->honor_akumulasi = $d->getHonorAkumulasi($d->mitra_id, $tahun, $bulan);
        }

        // mengambil data referensi
        $ref = Referensi::where('tahun', $tahun)->first();
        $ref->ppk = Pegawai::find($ref->ppk);

        // format tanggal data spk
        $ref->awal_bulan = Carbon::create($tahun, $bulan, 1);
        $ref->akhir_bulan = Carbon::create($tahun, $bulan, 1)->endOfMonth();
        $ref->terbilang_bulan = date_indo_bulan(explode('-', $ref->awal_bulan)[1]);
        $ref->terbilang_tgl = $ref->terbilang_tgl($ref->awal_bulan);

        return view('matriks.honor._print.spk', compact('data', 'ref'));
    }
}
