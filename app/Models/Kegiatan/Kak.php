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
        $data['konsumsi'] = ($pelatihan['konsumsi_pelatihan'] == "on");
        $data['akomodasi'] = ($pelatihan['akomodasi_pelatihan'] == "on");
        $data['translok'] = ($pelatihan['translok_pelatihan'] == "on");

        $res = DB::table('kaks_pelatihan')->insert($data);
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

    public function updatePoks($kaks_id, $detil)
    {
        DB::table('kaks_poks')->where('kaks_id', $kaks_id)->delete();
        $this->insertPoks($kaks_id, $detil);

        return true;
    }

    public function updatePelatihan($kaks_id, $pelatihan)
    {
        $data['kaks_id'] = $kaks_id;
        $data['peserta'] = $pelatihan['peserta_pelatihan'];
        $data['waktu_tempat'] = $pelatihan['waktu_tempat_pelatihan'];
        $data['konsumsi'] = ($pelatihan['konsumsi_pelatihan'] == "on");
        $data['akomodasi'] = ($pelatihan['akomodasi_pelatihan'] == "on");
        $data['translok'] = ($pelatihan['translok_pelatihan'] == "on");

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
