<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sk extends Model
{

    use HasFactory;

    protected $table = "sks";

    protected $fillable = [
        'no',
        'mak',
        'tentang',
        'tgl_mulai',
        'tgl_akhir',
        'tgl_berlaku',
        'tgl_ditetapkan',
    ];

    public function insertHonor($sks_id, $uraian_honor, $honor)
    {
        for ($i = 0; $i < count($honor); $i++) {
            if ($uraian_honor[$i] != null && $honor[$i] != null) {
                $data['sks_id'] = $sks_id;
                $data['uraian'] = $uraian_honor[$i];
                $data['honor'] = $honor[$i];

                $res[] = DB::table('sks_honor')->insert($data);
            }
        }

        return $res;
    }

    public function insertPetugas($sks_id, $daftar_petugas)
    {
        // dd($daftar_petugas);
        foreach ($daftar_petugas as $petugas) {
            $data['sks_id'] = $sks_id;
            $status = explode('-', $petugas['petugas']);
            $data['status'] = $status[0];
            if ($status[0] == 'O') {
                $data['pegawai_id'] = $status[1];
                $data['mitra_id'] = null;
            } else {
                $data['mitra_id'] = $status[1];
                $data['pegawai_id'] = null;
            }

            $data['sebagai'] = $petugas['sebagai'];
            // $data['keterangan'] = $petugas['keterangan']; // ga ada input keterangan

            $res = DB::table('sks_petugas')->insert($data);
        }

        return $res;
    }

    public function dateIndonesia($tanggal)
    {
        $result = Carbon::parse($tanggal)->locale('id');
        $result->settings(['formatFunction' => 'translatedFormat']);
        $tanggal = $result->format('j F Y');
        // dd($result->format('l, j F Y ; h:i a')); // Selasa, 16 Maret 2021 ; 08:27 pagi

        return $result;
    }

    public function getPetugas($id)
    {
        $result = DB::table('sks_petugas')->where('sks_id', $id)->get();
        foreach ($result as $value) {
            if ($value == 'O') {
                $pegawai = Pegawai::find($value->pegawai_id);
                $value->nama = $pegawai->nama;
                $value->gol = $pegawai->golongan;
            } else {
                $mitra = Mitra::find($id);
                // dd($mitra);
                $value->nama = $mitra->nama;
                $value->gol = '-';
            }
        }

        return $result;
    }
}
