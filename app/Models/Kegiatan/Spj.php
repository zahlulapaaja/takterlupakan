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
        'poks_id',
        'no',
        'nama_kegiatan',
        'tgl_mulai',
        'tgl_akhir',
        'tgl_spj',
        'pjk',
        'tahun'
    ];

    public function insertAlokasiBeban($spj_id, $request)
    {

        // dd($data['status']);
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
            $data['melakukan'] = $request['melakukan'][$i];
            $data['lokasi'] = $request['lokasi'][$i];

            $res[] = DB::table('spjs_alokasi_beban')->insert($data);
        }

        return $res;
    }
}
