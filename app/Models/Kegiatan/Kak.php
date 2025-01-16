<?php

namespace App\Models\Kegiatan;

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
}
