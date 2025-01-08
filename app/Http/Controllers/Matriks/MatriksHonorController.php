<?php

namespace App\Http\Controllers\Matriks;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan\Kegiatan;
use App\Models\Kegiatan\Sk;
use App\Models\Master\Pegawai;
use App\Models\Master\Referensi;
use App\Models\Master\Tim;
use App\Models\Matriks\MatriksHonor;
use App\Models\Pok;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Riskihajar\Terbilang\Facades\Terbilang;

class MatriksHonorController extends Controller
{
    public function index()
    {
        $data = MatriksHonor::select('tahun', 'bulan')
            ->groupBy('tahun')->groupBy('bulan')
            ->orderBy('tahun', 'DESC')
            ->orderBy('bulan', 'DESC')
            ->get();

        return view('matriks.honor.index', compact('data'));
    }

    public function list($tahun, $bulan)
    {
        $data = MatriksHonor::where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->get();

        // $terbilang_bulan = DateTime::createFromFormat('!m', $bulan)->format('F');

        foreach ($data as $d) {
            if (is_numeric($d->no_bast) && strpos($d->no_bast, '.') !== false) {
                $d->no_bast = sprintf('%04d', $d->no_bast) . '.' . explode('.', $d->no_bast)[1];
            } else {
                $d->no_bast = sprintf('%04d', $d->no_bast);
            }
            $d->keg = Kegiatan::find($d->kegiatans_id);
            $d->nama = $d->getNamaPetugas($d);
        }
        return view('matriks.honor.list', compact('data', 'tahun', 'bulan'));
    }

    public function create(Request $request)
    {
        if (!($request->has('kegiatans_id'))) {
            return redirect()->route('kegiatan.index');
        }

        // mengambil data kegiatan
        $keg = Kegiatan::find($request->kegiatans_id);
        $keg->pok = Pok::find($keg->poks_id);

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
        if ($request->column == 'no_bast') {
            $data['no_bast'] = $request->value;
        } else if ($request->column == 'sebagai') {
            $data['sebagai'] = $request->value;
        } else if ($request->column == 'volume') {
            $data['volume'] = $request->value;
        } else if ($request->column == 'harga') {
            $data['harga'] = $request->value;
        }

        $find = MatriksHonor::find($id);
        $find->update($data);
        return response()->json(['success' => true, 'message' => 'Data updated successfully.']);
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

        // mengambil tanggal surat 
        $tgl = Carbon::create($data->tahun, $data->bulan, 1)->endOfMonth();
        $data->tgl = $tgl->toDateString();
        $data->terbilang_tgl =
            $tgl->isoFormat('dddd', $tgl)
            . ' Tanggal ' . Terbilang::make(explode('-', $data->tgl)[2])
            . ', Bulan ' . Terbilang::make(explode('-', $data->tgl)[1])
            . ', Tahun ' . Terbilang::make(explode('-', $data->tgl)[0]);


        // format tanggal data referensi
        // $ref->tgl_dipa = date_indo($ref->tgl_dipa);
        // $ref->tgl_sk_kpa = date_indo($ref->tgl_sk_kpa);

        // $views =
        //     view('kegiatan.spj._print.daftar-honor', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.bast', compact('data', 'ref'))->render() .
        //     view('kegiatan.spj._print.pernyataan', compact('data', 'ref'))->render();
        return view('matriks.honor.bast_print', compact('data', 'ref'));
        // return $views;
    }
}
