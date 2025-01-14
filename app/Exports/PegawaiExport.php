<?php

namespace App\Exports;

use App\Models\Master\Pegawai;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PegawaiExport implements FromQuery, WithColumnFormatting, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    private int $row = 1;

    public function query()
    {
        return Pegawai::query()->orderBy('nama', 'ASC');;
    }

    public function map($data): array
    {
        return [
            $this->row++,
            $data->nama,
            $data->nip_lama . ' ', // biar kebaca text tanpa kepotong
            $data->nip_baru . ' ', // biar kebaca text tanpa kepotong
            $data->nik . ' ', // biar kebaca text tanpa kepotong
            $data->golongan,
            $data->pangkat,
            $data->jabatan,
            $data->email,
            $data->no_rek . ' ', // biar kebaca text tanpa kepotong
            $data->nama_bank,
            $data->an_rek,
            $data->no_hp,
            $data->catatan,
        ];
    }

    public function headings(): array
    {
        return [
            "No",
            "Nama",
            "NIP",
            "NIP Baru",
            "NIK",
            "Golongan",
            "Pangkat",
            "Jabatan",
            "Email",
            "No Rekening",
            "Nama Bank",
            "Atas Nama",
            "No HP",
            "Catatan",
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
