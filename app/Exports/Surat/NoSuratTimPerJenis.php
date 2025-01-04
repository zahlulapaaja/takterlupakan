<?php

namespace App\Exports\Surat;

use App\Models\User;
use App\Models\Master\Tim;
use App\Models\Surat\NoSuratTim;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class NoSuratTimPerJenis implements FromQuery, WithHeadings, WithMapping, WithTitle
{
    use Exportable;

    protected int $tahun;
    private string $jenis;

    public function __construct(int $tahun, string $jenis)
    {
        $this->tahun = $tahun;
        $this->jenis = $jenis;
    }

    public function query()
    {
        $query = NoSuratTim::query()
            ->orderBy('tahun', 'DESC')
            ->orderBy('tim', 'ASC')
            ->orderBy('no', 'ASC')
            ->where('jenis', $this->jenis);
        if ($this->tahun != 0) $query->whereYear('tgl', $this->tahun);
        return $query;
    }

    public function map($data): array
    {
        return [
            $data->no,
            $data->jenis,
            date_indo($data->tgl),
            $data->rincian,
            $data->keterangan,
            $data->tahun,
            Tim::find($data->tim)->singkatan,
            User::select('name')->where('id', $data->edited_by)->first()->name,
        ];
    }

    public function headings(): array
    {
        return ["Nomor Surat", "Jenis", "Tanggal", "Rincian", "Keterangan", "Tahun", "Tim", "Diedit Oleh"];
    }

    public function title(): string
    {
        return $this->jenis;
    }
}
