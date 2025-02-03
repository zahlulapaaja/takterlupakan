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
    // public string $no_sk;

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

    // public function getNoSk($sk)
    // {
    //     $this->no_sk = 'B-' . $sk->no . '/11070/KP.311/' . $sk->tahun;
    //     return $this->no_sk;
    // }

    public function insertHonor($sks_id, $daftar_honor)
    {
        foreach ($daftar_honor as $d) {
            $data['sks_id'] = $sks_id;
            $data['uraian'] = $d['uraian_honor'];
            $data['honor'] = $d['honor'];

            $res[] = DB::table('sks_honor')->insert($data);
        }

        return $res;
    }

    public function insertPetugas($sks_id, $daftar_petugas)
    {
        foreach ($daftar_petugas as $petugas) {
            $data['sks_id'] = $sks_id;
            $status = explode('-', $petugas['petugas']);
            $data['status'] = $status[0];
            if ($status[0] == config('constants.PEGAWAI')) {
                $data['pegawai_id'] = $status[2];
                $data['mitra_id'] = null;
            } else {
                $data['mitra_id'] = $status[2];
                $data['pegawai_id'] = null;
            }

            $data['sebagai'] = $petugas['sebagai'];
            // $data['keterangan'] = $petugas['keterangan']; // ga ada input keterangan

            $res = DB::table('sks_petugas')->insert($data);
        }

        return $res;
    }

    public function updateHonor($sks_id, $daftar_honor)
    {
        DB::table('sks_honor')->where('sks_id', $sks_id)->delete();

        foreach ($daftar_honor as $d) {
            $data['sks_id'] = $sks_id;
            $data['uraian'] = $d['uraian_honor'];
            $data['honor'] = $d['honor'];

            $res[] = DB::table('sks_honor')->insert($data);
        }

        return $res;
    }

    public function updatePetugas($sks_id, $daftar_petugas)
    {
        DB::table('sks_petugas')->where('sks_id', $sks_id)->delete();

        foreach ($daftar_petugas as $petugas) {
            $data['sks_id'] = $sks_id;
            $status = explode('-', $petugas['petugas']);
            $data['status'] = $status[0];
            if ($status[0] == config('constants.PEGAWAI')) {
                $data['pegawai_id'] = $status[2];
                $data['mitra_id'] = null;
            } else {
                $data['mitra_id'] = $status[2];
                $data['pegawai_id'] = null;
            }

            $data['sebagai'] = $petugas['sebagai'];
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
            $p->list = config('constants.PEGAWAI') . '-' . $p->nama . '-' . $p->id;
            $p->status = config('constants.PEGAWAI');
            $list_petugas[] = $p;
        }
        foreach ($mitra as $m) {
            $m->list = config('constants.MITRA') . '-' . $m->nama . '-' . $m->id;
            $m->status = config('constants.MITRA');
            $list_petugas[] = $m;
        }

        return $list_petugas;
    }

    public function getPetugas($sks_id)
    {
        $result = DB::table('sks_petugas')->where('sks_id', $sks_id)->get();

        foreach ($result as $value) {
            if ($value->status == config('constants.PEGAWAI')) {
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
