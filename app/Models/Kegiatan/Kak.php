<?php

namespace App\Models\Kegiatan;

use App\Models\Master\Pegawai;
use App\Models\Pok;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kak extends Model
{
    use HasFactory;

    protected $table = "kaks";
    protected $guarded = [];

    public function insertPoks($kaks_id, $detil)
    {
        $res = false;
        foreach ($detil as $d) {
            $data['kaks_id'] = $kaks_id;
            $data['poks_id'] = $d;
            $res[] = DB::table('kaks_poks')->insert($data);
        }

        return $res;
    }

    public function insertPeserta($kaks_id, $daftar_peserta_perjadin)
    {
        $res = false;
        foreach ($daftar_peserta_perjadin as $p) {
            $data['kaks_id'] = $kaks_id;
            $data['pegawais_id'] = $p['peserta'];
            $res[] = DB::table('kaks_perjadin')->insert($data);
        }

        return $res;
    }

    public function insertSpesifikasi($kaks_id, $daftar_spesifikasi)
    {
        $res = false;
        foreach ($daftar_spesifikasi as $s) {
            $data['kaks_id'] = $kaks_id;
            $data['volume'] = $s['volume'];
            $data['satuan'] = $s['satuan'];
            $data['spesifikasi'] = $s['spesifikasi'];

            $res[] = DB::table('kaks_spesifikasi')->insert($data);
        }

        return $res;
    }

    public function getDetilPok($kaks_id)
    {
        $result = [];
        $list_detil = DB::table('kaks_poks')->where('kaks_id', $kaks_id)->get();
        foreach ($list_detil as $d) {
            $result[] = Pok::find($d->poks_id);
        }

        return $result;
    }

    public function getPesertaPerjadin($kaks_id)
    {
        $result = [];
        $daftar_peserta = DB::table('kaks_perjadin')->where('kaks_id', $kaks_id)->get();
        foreach ($daftar_peserta as $p) {
            $result[] = Pegawai::find($p->pegawais_id);
        }

        return $result;
    }
}
