<?php

namespace App\Exports\Surat;

use App\Models\Surat\NoFp;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NoFpExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected int $tahun;

    public function __construct(int $tahun)
    {
        $this->tahun = $tahun;
    }

    public function query()
    {
        $query = NoFp::query()
            ->orderBy('tahun', 'DESC')
            ->orderBy('no', 'ASC');
        if ($this->tahun != 0) $query->whereYear('tgl', $this->tahun);
        return $query;
    }

    public function map($data): array
    {

        return [
            $data->no,
            $data->rincian,
            date_indo($data->tgl),
            $data->tahun,
            User::select('name')->where('id', $data->edited_by)->first()->name,
        ];
    }

    public function headings(): array
    {
        return ["No", "Rincian", "Tanggal", "Tahun", "Diedit Oleh"];
    }
}
