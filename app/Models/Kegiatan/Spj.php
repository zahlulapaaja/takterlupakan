<?php

namespace App\Models\Kegiatan;

use App\Models\Master\Mitra;
use App\Models\Master\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Spj extends Model
{
    use HasFactory;

    protected $table = "spjs";

    protected $fillable = [
        'kegiatans_id',
        'tgl',
        'no_st',
        'tgl_st',
        'kode_akun',
        'tahun',
        'edited_by',
    ];

    public function insertSpjHonor($spj_id, $request)
    {
        for ($i = 0; $i < count($request['status']); $i++) {
            $data['spjs_id'] = $spj_id;
            $data['status'] = $request['status'][$i];
            if ($request['status'][$i] == config('constants.MITRA')) {
                $data['mitra_id'] = $request['id_status'][$i];
                $data['pegawai_id'] = null;
            } else {
                $data['mitra_id'] = null;
                $data['pegawai_id'] = $request['id_status'][$i];
            }
            $data['checkbox'] = false;
            if (in_array($i, $request['checkbox'])) $data['checkbox'] = true;

            $data['beban'] = ($request['beban'][$i] == null) ? 0 : $request['beban'][$i];
            $res[] = DB::table('spjs_honor')->insert($data);
        }

        return $res;
    }

    public function insertSpjTranslok($spj_id, $daftar_petugas)
    {
        foreach ($daftar_petugas as $petugas) {
            $data['spjs_id'] = $spj_id;
            $status = explode('-', $petugas['petugas']);
            $data['status'] = $status[0];
            if ($status[0] == config('constants.PEGAWAI')) {
                $data['pegawai_id'] = $status[2];
                $data['mitra_id'] = null;
            } else {
                $data['mitra_id'] = $status[2];
                $data['pegawai_id'] = null;
            }

            $data['byk_kunj'] = $petugas['byk_kunj'];
            $data['melakukan'] = $petugas['melakukan'];
            $data['lokasi'] = $petugas['lokasi'];
            $data['tgl_kunj'] = $petugas['tgl_kunj'];
            $data['nominal'] = $petugas['nominal'];

            $res[] = DB::table('spjs_translok')->insert($data);
        }

        return $res;
    }

    public function getPetugas($data, $akun)
    {
        if ($akun == config('constants.AKUN_HONOR')) {
            $result = DB::table('spjs_honor')->where('spjs_id', $data->id)->get();
        } else if ($akun == config('constants.AKUN_TRANSLOK')) {
            $result = DB::table('spjs_translok')->where('spjs_id', $data->id)->get();
        }

        foreach ($result as $r) {
            if ($r->status == config('constants.PEGAWAI')) {
                $pegawai = Pegawai::find($r->pegawai_id);
                $r->nama = $pegawai->nama;
                $r->gol = $pegawai->golongan;
                $r->jabatan = $pegawai->jabatan;
                $r->id_status = $pegawai->id;
                $r->nama_bank = $pegawai->nama_bank;
                $r->no_rek = $pegawai->no_rek;
                $r->an_rek = $pegawai->an_rek;
                $r->nip = 'NIP. ' . $pegawai->nip_baru;
            } else {
                $mitra = Mitra::find($r->mitra_id);
                $r->nama = $mitra->nama;
                $r->gol = '-';
                $r->jabatan = 'Mitra Statistik';
                $r->id_status = $mitra->id;
                $r->nama_bank = $mitra->nama_bank;
                $r->no_rek = $mitra->no_rek;
                $r->an_rek = $mitra->an_rek;
                $r->nip = $mitra->id_sobat;
            }
        }

        return $result;
    }

    public function updateSpj($spj_id, $request)
    {
        if ($request['akun'] == config('constants.AKUN_HONOR')) {
            for ($i = 0; $i < count($request['id_honor']); $i++) {
                $data['beban'] = $request['beban'][$i];
                $data['checkbox'] = false;
                if (in_array($i, $request['checkbox'])) $data['checkbox'] = true;

                // update data 
                $res[] = DB::table('spjs_honor')
                    ->where('id', $request['id_honor'][$i])
                    ->update($data);
            }
        } else if ($request['akun'] == config('constants.AKUN_TRANSLOK')) {
            // hapus data yang ada 
            DB::table('spjs_translok')->where('spjs_id', $spj_id)->delete();

            // nambah data baru
            $daftar_petugas = $request['daftar_petugas_translok'];
            foreach ($daftar_petugas as $petugas) {
                $data['spjs_id'] = $spj_id;
                $status = explode('-', $petugas['petugas']);
                $data['status'] = $status[0];
                if ($status[0] == config('constants.PEGAWAI')) {
                    $data['pegawai_id'] = $status[2];
                    $data['mitra_id'] = null;
                } else {
                    $data['mitra_id'] = $status[2];
                    $data['pegawai_id'] = null;
                }

                $data['byk_kunj'] = $petugas['byk_kunj'];
                $data['melakukan'] = $petugas['melakukan'];
                $data['lokasi'] = $petugas['lokasi'];
                $data['tgl_kunj'] = $petugas['tgl_kunj'];
                $data['nominal'] = $petugas['nominal'];

                $res[] = DB::table('spjs_translok')->insert($data);
            }
        }
        return $res;
    }

    public function deleteSpj($spj)
    {
        if ($spj->kode_akun == config('constants.AKUN_HONOR')) {
            DB::table('spjs_honor')->where('spjs_id', $spj->id)
                ->delete();
            return true;
        } else if ($spj->kode_akun == config('constants.AKUN_TRANSLOK')) {
            DB::table('spjs_translok')->where('spjs_id', $spj->id)
                ->delete();
            return true;
        }
    }
}
