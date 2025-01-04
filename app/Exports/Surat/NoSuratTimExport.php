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

        $data = NoSuratTim::distinct();
        if ($this->tahun != 0) $data->where('tahun', $this->tahun);
        $jenis = $data->get('jenis');

        foreach ($jenis as $j) {
            $sheets[] = new NoSuratTimPerJenis($this->tahun, $j->jenis);
        }

        return $sheets;
    }
}
