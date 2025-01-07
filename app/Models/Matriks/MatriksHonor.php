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

    public function insertBast($matriks_honors_id, $request)
    {
        // mengambil data nomor terakhir
        $no = DB::table('matriks_honors_bast')->where('tahun', $request['tahun'])->max('no');
        $no ? $no = (int)$no + 1 : $no = 1; // kalo dapat yang ada titik akan roundup

        // looping setiap petugas
        for ($i = 0; $i < count($request['status']); $i++) {
            // cek apakah ada di ceklis
            if (in_array($i, $request['checkbox'])) {
                $data['matriks_honors_id'] = $matriks_honors_id;
                $data['status'] = $request['status'][$i];
                if ($request['status'][$i] == config('constants.MITRA')) {
                    $data['mitra_id'] = $request['id_status'][$i];
                    $data['pegawai_id'] = null;
                } else {
                    $data['mitra_id'] = null;
                    $data['pegawai_id'] = $request['id_status'][$i];
                }

                $data['no'] = $no++;
                $data['sebagai'] = $request['sebagai'][$i];
                $data['volume'] = $request['volume'][$i];
                $data['harga'] = $request['harga'][$i];
                $data['tahun'] = $request['tahun'];
                $res[] = DB::table('matriks_honors_bast')->insert($data);
            }
        }

        return $res;
    }
}
