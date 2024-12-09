<?php

namespace App\Imports;

use App\Models\Pok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PokImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // klo null bisa ga masuk
        // if ($row[6] != null) {
        //     return new Pok([
        //         'nis' => $row[7],
        //         'name' => $row[12],
        //         'alahai' => $row[13],
        //     ]);
        // }

        // bisa deteksi angka atau bukan
        // if (is_int($row[7])) {
        //     return new Pok([
        //         'nis' => $row[8],
        //         'name' => $row[9],
        //         'alahai' => $row[10],
        //     ]);
        // }

        if ($row[1] != null) {
            // $keg = $row[1];
            session(['keg' => $row[1]]);
        }
        // $akun = '';
        if ($row[6] != null) {
            session(['akun' => $row[6]]);
            // $akun = $row[6];
        }

        if (is_int($row[7])) {
            return new Pok([
                'nis' => session('keg'),
                'name' => session('akun'),
                'alahai' => $row[8],
            ]);
        }


        return null;
    }

    public function startRow(): int
    {
        return 7;
    }
}
