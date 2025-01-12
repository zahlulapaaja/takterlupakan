<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = "mitras";

    protected $fillable = [
        'nama',
        'email',
        'id_sobat',
        'posisi',
        'alamat_detail',
        'alamat_prov',
        'alamat_kab',
        'alamat_kec',
        'alamat_desa',
        'jk',
        'tgl_lahir',
        'agama',
        'status',
        'pendidikan',
        'pekerjaan',
        'no_telp',
        'npwp',
        'catatan',
        'nama_bank',
        'no_rek',
        'an_rek',
        'tahun'
    ];

    public function getAgamaDesc($kode)
    {
        $desc = [
            1 => 'Islam',
            2 => 'Kristen',
            3 => 'Katolik',
            4 => 'Hindu',
            5 => 'Buddha',
            6 => 'Khonghucu',
            7 => 'Lainnya',
        ];
        return $desc[$kode];
    }

    public function getStatusDesc($kode)
    {
        $desc = [
            1 => 'Belum Kawin',
            2 => 'Kawin',
            3 => 'Cerai Hidup',
            4 => 'Cerai Mati'
        ];
        return $desc[$kode];
    }

    public function getJkDesc($kode)
    {
        $desc = [
            1 => 'Laki-laki',
            2 => 'Perempuan',
        ];
        return $desc[$kode];
    }

    public function getKecDesc($kec)
    {
        switch ($kec) {
            case '050':
                return 'Johan Pahlawan';
                break;
            case '060':
                return 'Samatiga';
                break;
            case '061':
                return 'Bubon';
                break;
            case '062':
                return 'Arongan Lambalek';
                break;
            case '070':
                return 'Woyla';
                break;
            case '071':
                return 'Woyla Barat';
                break;
            case '072':
                return 'Woyla Timur';
                break;
            case '080':
                return 'Kaway XVI';
                break;
            case '081':
                return 'Meureubo';
                break;
            case '082':
                return 'Pante Ceureumen';
                break;
            case '083':
                return 'Panton Reu';
                break;
            case '090':
                return 'Sungai Mas';
                break;
        }
    }
}
