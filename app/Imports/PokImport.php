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

        // ($row[0]) ? session(['kode_pro' => $row[0], 'pro' => $row[7]]) : null;
        // ($row[1]) ? session(['kode_keg' => $row[1], 'keg' => $row[7]]) : null;
        ($row[0]) ? session(['kode_pro' => substr($row[0], 1, 2)]) : null;
        ($row[0]) ? session(['pro' => $row[7]]) : null;
        ($row[1]) ? session(['kode_keg' => substr($row[1], 1, 4)]) : null;
        ($row[1]) ? session(['keg' => $row[7]]) : null;
        ($row[2]) ? session(['kode_out' => substr($row[2], 1, 3)]) : null;
        ($row[2]) ? session(['out' => $row[7]]) : null;
        ($row[3]) ? session(['kode_subout' => substr($row[3], 1, 3)]) : null;
        ($row[3]) ? session(['subout' => $row[7]]) : null;
        ($row[4]) ? session(['kode_komp' => substr($row[4], 1, 3)]) : null;
        ($row[4]) ? session(['komp' => $row[7]]) : null;
        ($row[5]) ? session(['kode_subkomp' => substr($row[5], 1, 1)]) : null;
        ($row[5]) ? session(['subkomp' => $row[7]]) : null;
        ($row[6]) ? session(['kode_akun' => substr($row[6], 1, 6)]) : null;
        ($row[6]) ? session(['akun' => $row[7]]) : null;

        // dd($row);
        // dd(session()->all());

        if (is_int($row[7])) {
            return new Pok([
                'kode_program' => session('kode_pro'),
                'program' => session('pro'),
                'kode_kegiatan' => session('kode_keg'),
                'kegiatan' => session('keg'),
                'kode_output' => session('kode_out'),
                'output' => session('out'),
                'kode_suboutput' => session('kode_subout'),
                'suboutput' => session('subout'),
                'kode_komponen' => session('kode_komp'),
                'komponen' => session('komp'),
                'kode_subkomponen' => session('kode_subkomp'),
                'subkomponen' => session('subkomp'),
                'kode_akun' => session('kode_akun'),
                'akun' => session('akun'),
                'item_kegiatan' => $row[8],
                'volume' => $row[9],
                'satuan' => $row[10],
                'harga' => $row[11],
                'jumlah' => $row[13],
                'tahun' => '2024',
            ]);
        }

        return null;
    }

    public function startRow(): int
    {
        return 8;
    }
}
