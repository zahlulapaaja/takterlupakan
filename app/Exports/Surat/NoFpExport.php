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
    private int $row = 1;

    public function __construct(int $tahun)
    {
        $this->tahun = $tahun;
    }

    public function query()
    {
        return NoFp::query()->whereYear('tgl', $this->tahun);
    }

    public function map($data): array
    {

        return [
            $this->row++,
            $data->rincian,
            date_indo($data->tgl),
            User::select('name')->where('id', $data->edited_by)->first()->name,
        ];
    }

    public function headings(): array
    {
        return ["No", "Rincian", "Tanggal", "Diedit Oleh"];
    }
}
