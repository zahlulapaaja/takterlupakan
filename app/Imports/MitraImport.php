<?php

namespace App\Imports;

use App\Models\Master\Mitra;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MitraImport implements ToModel, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        // dd($row);
        $tgl_lahir = Carbon::createFromFormat('d/m/Y', $row[11])->format('Y-m-d');
        if ($row[2]) {
            return new Mitra([
                'email' => $row[0],
                'id_sobat' => $row[1],
                'posisi' => $row[2],
                'nama' => $row[5],
                'alamat_detail' => $row[6],
                'alamat_prov' => $row[7],
                'alamat_kab' => $row[8],
                'alamat_kec' => $row[9],
                'alamat_desa' => $row[10],
                'tgl_lahir' => $tgl_lahir,
                'jk' => $row[12],
                'agama' => $row[13],
                'status' => $row[14],
                'pendidikan' => $row[15],
                'pekerjaan' => $row[16],
                'no_telp' => $row[18],
                'npwp' => $row[19],
                'catatan' => $row[31],
                'nama_bank' => $row[40],
                'no_rek' => $row[41],
                'an_rek' => $row[42],
                'tahun' => session('tahun'),
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
