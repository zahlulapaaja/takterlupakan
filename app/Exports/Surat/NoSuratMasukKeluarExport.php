<?php

namespace App\Exports\Surat;

use App\Models\Surat\NoFp;
use App\Models\Surat\NoSuratMasukKeluar;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class NoSuratMasukKeluarExport implements FromQuery, WithHeadings, WithMapping, WithEvents
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
        return NoSuratMasukKeluar::query()->whereYear('tgl', $this->tahun);
    }

    public function map($data): array
    {

        if ($data->jenis == 'masuk') {
            $surat = DB::table('no_surat_masuks')->find($data->no_surat_masuks_id);
            return [
                $this->row++,
                $surat->pengirim,
                $surat->no_masuk,
                date_indo($surat->tgl_surat),
                $surat->rincian,
                null,
                null,
                null,
                $surat->keterangan,
                User::select('name')->where('id', $data->edited_by)->first()->name,
            ];
        } else if ($data->jenis == 'keluar') {
            $surat = DB::table('no_surat_keluars')->find($data->no_surat_keluars_id);
            return [
                $this->row++,
                null,
                null,
                null,
                null,
                $surat->rincian,
                $surat->tujuan,
                date_indo($data->tgl),
                $surat->keterangan,
                User::select('name')->where('id', $data->edited_by)->first()->name,
            ];
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->mergeCells('A1:A2');
                $event->sheet->mergeCells('B1:E1');
                $event->sheet->mergeCells('F1:H1');
                $event->sheet->mergeCells('I1:I2');
                $event->sheet->mergeCells('J1:J2');
            }
        ];
    }

    public function headings(): array
    {
        return [
            ["Nomor", "Surat Masuk", "", "", "", "Surat Keluar", "", "", "Keterangan", "Diedit Oleh"],
            ["", "Pengirim", "Nomor", "Tanggal", "Ringkasan", "Ringkasan", "Alamat", "Tanggal", ""],
        ];
    }
}
