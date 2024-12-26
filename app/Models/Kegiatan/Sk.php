<?php

namespace App\Models\Kegiatan;

use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
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
        'tahun',
        'edited_by',
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

    public function updateHonor($sks_id, $uraian_honor, $honor)
    {
        DB::table('sks_honor')->where('sks_id', $sks_id)->delete();

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

    public function updatePetugas($sks_id, $daftar_petugas)
    {
        // dd($daftar_petugas);
        DB::table('sks_petugas')->where('sks_id', $sks_id)->delete();

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
            // dd($data);
            // $data['keterangan'] = $petugas['keterangan']; // ga ada input keterangan

            DB::table('sks_petugas')->insert($data);
        }

        return true;
    }

    public function getListPetugas($tahun)
    {
        $mitra = Mitra::orderBy('nama', 'ASC')->where('tahun', $tahun)->get();
        $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        $list_petugas = [];
        foreach ($pegawai as $p) {
            $p->list = '[O] ' . $p->nama;
            $p->status = 'O';
            $list_petugas[] = $p;
        }
        foreach ($mitra as $m) {
            $m->list = '[N] ' . $m->nama;
            $m->status = 'N';
            $list_petugas[] = $m;
        }

        return $list_petugas;
    }

    public function getPetugas($sks_id)
    {
        $result = DB::table('sks_petugas')->where('sks_id', $sks_id)->get();

        foreach ($result as $value) {
            if ($value->status == 'O') {
                $pegawai = Pegawai::find($value->pegawai_id);
                $value->nama = $pegawai->nama;
                $value->gol = $pegawai->golongan;
                $value->id_status = $pegawai->id;
            } else {
                $mitra = Mitra::find($value->mitra_id);
                $value->nama = $mitra->nama;
                $value->gol = '-';
                $value->id_status = $mitra->id;
            }
        }

        return $result;
    }

    public function deleteSk($sks_id)
    {
        DB::table('sks_honor')->where('sks_id', $sks_id)->delete();
        DB::table('sks_petugas')->where('sks_id', $sks_id)->delete();

        return true;
    }
}
