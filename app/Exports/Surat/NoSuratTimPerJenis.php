<?php

namespace App\Exports\Surat;

use App\Models\Surat\NoSuratTim;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class NoSuratTimPerJenis implements FromQuery, WithHeadings, WithMapping, WithTitle
{
    use Exportable;

    protected int $tahun;
    private string $jenis;
    private int $row = 1;

    public function __construct(int $tahun, string $jenis)
    {
        $this->tahun = $tahun;
        $this->jenis = $jenis;
    }

    public function query()
    {
        return NoSuratTim::query()
            ->where('jenis', $this->jenis)
            ->whereYear('tgl', $this->tahun);
    }

    public function map($data): array
    {
        return [
            $this->row++,
            $data->jenis,
            $data->tahun,
            $data->no,
            date_indo($data->tgl),
            $data->rincian,
            $data->keterangan,
            User::select('name')->where('id', $data->edited_by)->first()->name,
        ];
    }

    public function headings(): array
    {
        return ["No", "Jenis", "Tahun", "Nomor Surat", "Tanggal", "Rincian", "Keterangan", "Diedit Oleh"];
    }

    public function title(): string
    {
        return $this->jenis;
    }
}
