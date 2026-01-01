<?php

namespace App\Models\Matriks;

use App\Models\Kegiatan\Kegiatan;
use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use App\Models\Pok;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class MatriksHonor extends Model
{
    use HasFactory;

    protected $table = "matriks_honors";
    protected $guarded = [];

    public function getNamaPetugas($data)
    {
        if ($data->status == config('constants.PEGAWAI')) {
            $pegawai = Pegawai::find($data->pegawai_id);
            return $pegawai->nama;
        } else {
            $mitra = Mitra::find($data->mitra_id);
            return $mitra->nama;
        }
    }

    public function getNipPetugas($data)
    {
        if ($data->status == config('constants.PEGAWAI')) {
            $pegawai = Pegawai::find($data->pegawai_id);
            return $pegawai->nip;
        } else {
            $mitra = Mitra::find($data->mitra_id);
            return $mitra->id_sobat;
        }
    }

    public function getLastNo($tahun)
    {
        $no = MatriksHonor::where('tahun', $tahun)
            ->orderByRaw('CAST(no_bast AS UNSIGNED) DESC')
            ->first();
        $no ? $no = (int)$no->no_bast + 1 : $no = 1; // kalo dapat yang ada titik akan roundup
        return $no;
    }

    public function insertData($request)
    {
        // mengambil data nomor terakhir
        $no = $this->getLastNo($request['tahun']);

        // looping setiap petugas
        for ($i = 0; $i < count($request['status']); $i++) {
            // cek apakah ada di ceklis
            if (in_array($i, $request['checkbox'])) {
                $data['status'] = $request['status'][$i];
                if ($request['status'][$i] == config('constants.MITRA')) {
                    $data['mitra_id'] = $request['id_status'][$i];
                    $data['pegawai_id'] = null;
                } else {
                    $data['mitra_id'] = null;
                    $data['pegawai_id'] = $request['id_status'][$i];
                }

                // data tanggal bast
                $bulan_akhir_keg = (int)explode('-', $request['tgl_akhir'])[1];
                if ($bulan_akhir_keg == $request['bulan']) {
                    $tgl_bast = date('Y-m-d', strtotime('+1 Weekday', strtotime($request['tgl_akhir'])));
                } else {
                    $tgl = $request['tahun'] . '-' . $request['bulan'] . '-01';
                    $tgl_bast = date('Y-m-d', strtotime('+1 Weekday', strtotime(date("Y-m-t", strtotime($tgl)))));
                }

                // assign data 
                $data['no_bast'] = $no++;
                $data['tgl_bast'] = $tgl_bast;
                $data['kegiatans_id'] = $request['kegiatans_id'];
                $data['sebagai'] = $request['sebagai'][$i];
                $data['volume'] = $request['volume'][$i];
                $data['harga'] = $request['harga'][$i];
                $data['bulan'] = $request['bulan'];
                $data['tahun'] = $request['tahun'];
                $data['edited_by'] = session('user_id');

                // create data 
                $res[] = $this->create($data);
            }
        }

        return $res;
    }

    public function getNoBast($matriks)
    {
        if (is_numeric($matriks->no_bast) && strpos($matriks->no_bast, '.') !== false) {
            $no_bast = sprintf('%04d', $matriks->no_bast) . '.' . explode('.', $matriks->no_bast)[1];
        } else {
            $no_bast = sprintf('%04d', $matriks->no_bast);
        }

        $result = $no_bast . "/BAST/BPS/1107/" . sprintf("%02d", $matriks->bulan) .  "/" . $matriks->tahun;
        return $result;
    }

    public function getNoSpk($no, $tahun, $bulan)
    {
        $result = sprintf('%04d', $no) . "/SPK/BPS/1107/" . sprintf("%02d", $bulan) .  "/" . $tahun;
        return $result;
    }

    public function getDataHonor($mitra_id, $tahun, $bulan)
    {
        $result = MatriksHonor::select('*')
            ->where('mitra_id', $mitra_id)
            ->where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->get();

        foreach ($result as $r) {
            $r->keg = Kegiatan::find($r->kegiatans_id);
            if ((int)explode('-', $r->keg->tgl_mulai)[1] != $bulan) {
                $r->keg->tgl_mulai = Carbon::create($tahun, $bulan, 1);
            }
            if ((int)explode('-', $r->keg->tgl_akhir)[1] != $bulan) {
                Carbon::create($tahun, $bulan, 1)->endOfMonth();
            }
            // dd($r->keg);
            $pok = Pok::find($r->keg->poks_id)->first();
            $r->satuan = $pok->satuan;
            $r->mak = $pok->getMak($pok);
        }

        return $result;
    }

    public function getHonorAkumulasi($mitra_id, $tahun, $bulan)
    {
        $result = MatriksHonor::select('*')
            ->where('mitra_id', $mitra_id)
            ->where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->get();

        $total = 0;
        foreach ($result as $r) {
            $total += $r->volume * $r->harga;
        }

        return $total;
    }

    public static function rapikanNomorBast($tahun, $bulan)
    {
        $data = self::where('tahun', $tahun)
            ->where('bulan', $bulan)
            // ->orderByRaw('CAST(no_bast AS UNSIGNED) ASC') // pastikan urut numerik
            ->get();

        $no = $data[0]->no_bast;
        foreach ($data as $row) {
            $row->no_bast = str_pad($no, 4, '0', STR_PAD_LEFT);
            $row->save();
            $no++;
        }

        return true;
    }
}
