<?php

namespace App\Exports\Surat;

use App\Models\Surat\NoSuratTim;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class NoSuratTimExport implements WithMultipleSheets
{
    use Exportable;

    protected int $tahun;

    public function __construct(int $tahun)
    {
        $this->tahun = $tahun;
    }

    public function sheets(): array
    {

        $sheets = [];

        $data = NoSuratTim::distinct()->where('tahun', $this->tahun)
            ->get('jenis');

        foreach ($data as $d) {
            $sheets[] = new NoSuratTimPerJenis($this->tahun, $d->jenis);
        }

        return $sheets;
    }
}
