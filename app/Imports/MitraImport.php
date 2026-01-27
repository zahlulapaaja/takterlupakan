<?php

namespace App\Imports;

use App\Models\Master\Mitra;
use Carbon\Carbon;
use DateTime;
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
        if ($row[2] == "Diterima") {
            // Olah tanggal dulu -- Ambil tanggal saja
            preg_match('/\d{1,2} [A-Za-z]+ \d{4}/', $row[9], $matches);
            $tanggal = $matches[0]; // 28 April 1997

            // Mapping bulan Indo ke English
            $bulan = [
                'Januari' => 'January',
                'Februari' => 'February',
                'Maret' => 'March',
                'April' => 'April',
                'Mei' => 'May',
                'Juni' => 'June',
                'Juli' => 'July',
                'Agustus' => 'August',
                'September' => 'September',
                'Oktober' => 'October',
                'November' => 'November',
                'Desember' => 'December'
            ];

            $tanggal = str_replace(array_keys($bulan), array_values($bulan), $tanggal);

            // Convert ke DateTime
            $date = DateTime::createFromFormat('d F Y', $tanggal);

            return new Mitra([
                'email' => $row[16],
                'id_sobat' => $row[15],
                'posisi' => $row[1],
                'nama' => $row[0],
                'alamat_detail' => $row[4],
                'alamat_prov' => $row[5],
                'alamat_kab' => $row[6],
                'alamat_kec' => $row[7],
                'alamat_desa' => $row[8],
                'tgl_lahir' => $date,
                'jk' => ($row[10] == 'Lk') ? 1 : 2,
                // 'agama' => $row[13],
                // 'status' => $row[14],
                'pendidikan' => $row[11],
                'pekerjaan' => $row[12],
                'no_telp' => $row[14],
                // 'npwp' => $row[19],
                'catatan' => $row[13],
                'nama_bank' => $row[17],
                'no_rek' => (string) $row[18],
                'an_rek' => $row[19],
                'tahun' => session('tahun'),
            ]);
        }
    }

    public function startRow(): int
    {
        return 3;
    }
}
