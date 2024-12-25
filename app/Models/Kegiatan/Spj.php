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
            if ($request['status'][$i] == "N") {
                $data['mitra_id'] = $request['id_status'][$i];
                $data['pegawai_id'] = null;
            } else {
                $data['mitra_id'] = null;
                $data['pegawai_id'] = $request['id_status'][$i];
            }

            $data['beban'] = $request['beban'][$i];
            $res[] = DB::table('spjs_honor')->insert($data);
        }

        return $res;
    }

    public function insertSpjTranslok($spj_id, $request)
    {
        for ($i = 0; $i < count($request['status']); $i++) {
            $data['spjs_id'] = $spj_id;
            $data['status'] = $request['status'][$i];
            if ($request['status'][$i] == "N") {
                $data['mitra_id'] = $request['id_status'][$i];
                $data['pegawai_id'] = null;
            } else {
                $data['mitra_id'] = null;
                $data['pegawai_id'] = $request['id_status'][$i];
            }

            $data['byk_kunj'] = $request['byk_kunj'][$i];
            $data['melakukan'] = $request['melakukan'][$i];
            $data['lokasi'] = $request['lokasi'][$i];
            $data['tgl_kunj'] = $request['tgl_kunj'][$i];
            $data['nominal'] = $request['nominal'][$i];

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
            if ($r->status == 'O') {
                $pegawai = Pegawai::find($r->pegawai_id);
                $r->nama = $pegawai->nama;
                $r->gol = $pegawai->golongan;
                $r->id_status = $pegawai->id;
            } else {
                $mitra = Mitra::find($r->mitra_id);
                $r->nama = $mitra->nama;
                $r->gol = '-';
                $r->id_status = $mitra->id;
            }
        }

        return $result;
    }

    public function updateSpj($request)
    {
        if ($request['akun'] == config('constants.AKUN_HONOR')) {
            for ($i = 0; $i < count($request['id_honor']); $i++) {
                $data['beban'] = $request['beban'][$i];

                // update data 
                $res[] = DB::table('spjs_honor')
                    ->where('id', $request['id_honor'][$i])
                    ->update($data);
            }
            return $res;
        } else if ($request['akun'] == config('constants.AKUN_TRANSLOK')) {
            for ($i = 0; $i < count($request['id_translok']); $i++) {
                $data['byk_kunj'] = $request['byk_kunj'][$i];
                $data['melakukan'] = $request['melakukan'][$i];
                $data['lokasi'] = $request['lokasi'][$i];
                $data['tgl_kunj'] = $request['tgl_kunj'][$i];
                $data['nominal'] = $request['nominal'][$i];

                // update data 
                $res[] = DB::table('spjs_translok')
                    ->where('id', $request['id_translok'][$i])
                    ->update($data);
            }
            return $res;
        }
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
