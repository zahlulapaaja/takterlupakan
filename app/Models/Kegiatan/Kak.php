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

    public function insertPoks($kaks_id, $detil, $id_pok, $vol, $satuan, $harga)
    {
        $res = false;
        $data['kaks_id'] = $kaks_id;

        for ($i = 0; $i < count($id_pok); $i++) {
            if (in_array($id_pok[$i], $detil)) {
                $data['poks_id'] = $id_pok[$i];
                $data['volume'] = $vol[$i];
                $data['satuan'] = $satuan[$i];
                $data['harga'] = $harga[$i];
                $res[] = DB::table('kaks_poks')->insert($data);
            }
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
            $data['rincian'] = $s['rincian'];
            $data['volume'] = $s['volume'];
            $data['satuan'] = $s['satuan'];
            $data['spesifikasi'] = $s['spesifikasi'];

            $res[] = DB::table('kaks_spesifikasi')->insert($data);
        }

        return $res;
    }

    public function insertPelatihan($kaks_id, $pelatihan)
    {
        $data['kaks_id'] = $kaks_id;
        $data['peserta'] = $pelatihan['peserta_pelatihan'];
        $data['waktu_tempat'] = $pelatihan['waktu_tempat_pelatihan'];
        $data['konsumsi'] = (empty($pelatihan['konsumsi_pelatihan'])) ? 0 : 1;
        $data['akomodasi'] = (empty($pelatihan['akomodasi_pelatihan'])) ? 0 : 1;
        $data['translok'] = (empty($pelatihan['translok_pelatihan'])) ? 0 : 1;

        $res = DB::table('kaks_pelatihan')->insert($data);
        return $res;
    }

    public function getDetilPok($kaks_id)
    {
        $list_detil = DB::table('kaks_poks')->where('kaks_id', $kaks_id)->get();
        foreach ($list_detil as $d) {
            $d->pok = Pok::find($d->poks_id);
        }

        $result = $list_detil;
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

    public function updatePoks($kaks_id, $detil, $id_pok, $vol, $satuan, $harga)
    {
        DB::table('kaks_poks')->where('kaks_id', $kaks_id)->delete();
        $this->insertPoks($kaks_id, $detil, $id_pok, $vol, $satuan, $harga);

        return true;
    }

    public function updatePelatihan($kaks_id, $pelatihan)
    {
        $data['kaks_id'] = $kaks_id;
        $data['peserta'] = $pelatihan['peserta_pelatihan'];
        $data['waktu_tempat'] = $pelatihan['waktu_tempat_pelatihan'];
        $data['konsumsi'] = (empty($pelatihan['konsumsi_pelatihan'])) ? 0 : 1;
        $data['akomodasi'] = (empty($pelatihan['akomodasi_pelatihan'])) ? 0 : 1;
        $data['translok'] = (empty($pelatihan['translok_pelatihan'])) ? 0 : 1;

        $res = DB::table('kaks_pelatihan')->where('kaks_id', $kaks_id)->update($data);
        return $res;
        // return true;
    }

    public function updatePeserta($kaks_id, $daftar_peserta_perjadin)
    {
        DB::table('kaks_perjadin')->where('kaks_id', $kaks_id)->delete();
        $this->insertPeserta($kaks_id, $daftar_peserta_perjadin);

        return true;
    }

    public function updateSpesifikasi($kaks_id, $daftar_spesifikasi)
    {
        DB::table('kaks_spesifikasi')->where('kaks_id', $kaks_id)->delete();
        $this->insertSpesifikasi($kaks_id, $daftar_spesifikasi);

        return true;
    }

    public function deleteKak($kaks_id)
    {
        DB::table('kaks_poks')->where('kaks_id', $kaks_id)->delete();
        DB::table('kaks_perjadin')->where('kaks_id', $kaks_id)->delete();
        DB::table('kaks_spesifikasi')->where('kaks_id', $kaks_id)->delete();
        DB::table('kaks_pelatihan')->where('kaks_id', $kaks_id)->delete();
        return true;
    }
}
