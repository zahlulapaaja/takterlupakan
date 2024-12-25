<?php

namespace App\Models\Kegiatan;

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

            $data['byk_kunj'] = $request['kunj'][$i];
            $data['melakukan'] = $request['melakukan'][$i];
            $data['lokasi'] = $request['lokasi'][$i];
            $data['tgl_kunj'] = $request['tgl_kunj'][$i];
            $data['nominal'] = $request['nominal'][$i];

            $res[] = DB::table('spjs_translok')->insert($data);
        }

        return $res;
    }
}
