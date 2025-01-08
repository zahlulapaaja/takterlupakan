<?php

namespace App\Models\Matriks;

use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

                // assign data 
                $data['no_bast'] = $no++;
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
        $result = $matriks->no_bast . "/BAST/BPS/1107/" . sprintf("%02d", $matriks->bulan) .  "/" . $matriks->tahun;
        return $result;
    }
}
