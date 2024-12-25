<?php

use Riskihajar\Terbilang\Facades\Terbilang;
?>
<div class="landscape-page">
    <!-- begin::Header -->
    <div class="flex flex-col place-items-center text-center font-bold uppercase">
        <div class="w-full flex flex-row-reverse font-normal mb-8">
            <div class="w-1/2 text-justify">
                PERATURAN DIREKTUR JENDERAL PERBENDAHARAAN NOMOR PER-22/PB/2013 TENTANG KETENTUAN
                LEBIH LANJUT PELAKSANAAN PERJALANAN DINAS DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI NEGERI
                DAN PEGAWAI TIDAK TETAP
            </div>
        </div>
        <div class="w-full text-left text-xl capitalize ml-8">Daftar - Transport Lokal {{$keg->nama}}</div>
    </div>
    <!-- end::Header -->

    <div class="leading-tight text-lg mt-4">
        <table class="text-left">
            <tr>
                <td class="pl-4 pr-12">Program</td>
                <td class="px-4">:</td>
                <td>{{$keg->pok->program}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Kegiatan</td>
                <td class="px-4">:</td>
                <td>{{$keg->pok->kegiatan}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">KRO</td>
                <td class="px-4">:</td>
                <td>{{$keg->pok->output}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">RO</td>
                <td class="px-4">:</td>
                <td class="capitalize">{{$keg->pok->suboutput}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Komponen</td>
                <td class="px-4">:</td>
                <td class="capitalize">{{$keg->pok->komponen}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Sub Komponen</td>
                <td class="px-4">:</td>
                <td class="capitalize">{{$keg->pok->subkomponen}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Akun</td>
                <td class="px-4">:</td>
                <td>{{$keg->pok->akun}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Satuan Kerja</td>
                <td class="px-4">:</td>
                <td>{{config('constants.SATKER')}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Kementerian/Lembaga</td>
                <td class="px-4">:</td>
                <td>{{config('constants.INSTANSI')}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Nomor Surat Tugas</td>
                <td class="px-4">:</td>
                <td>{{$data->no_st}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Tanggal</td>
                <td class="px-4">:</td>
                <td>{{date_indo($data->tgl_st)}}</td>
            </tr>
        </table>
    </div>

    <div class="leading-normal text-lg my-8 mx-4">
        <table class="table-auto w-full border border-black">
            <thead class="text-center">
                <tr>
                    <th class="border border-black">No.</th>
                    <th class="border border-black">Pelaksana SPD/<br>NIP</th>
                    <th class="border border-black">Asal<br>Penugasan</th>
                    <th class="border border-black">Tujuan<br>Perjalanan</th>
                    <th class="border border-black">Tgl Kunj</th>
                    <th class="border border-black">Banyak Kunj</th>
                    <th class="border border-black">Nominal<br>(Rp.)</th>
                    <th class="border border-black">Berita</th>
                    <th class="border border-black">Bank</th>
                    <th class="border border-black">Nama<br>Rekening</th>
                    <th class="border border-black">Nomor<br>Rekening</th>
                </tr>
                <tr>
                    <td class="text-sm border border-black">(1)</td>
                    <td class="text-sm border border-black">(2)</td>
                    <td class="text-sm border border-black">(3)</td>
                    <td class="text-sm border border-black">(4)</td>
                    <td class="text-sm border border-black">(5)</td>
                    <td class="text-sm border border-black">(6)</td>
                    <td class="text-sm border border-black">(7)</td>
                    <td class="text-sm border border-black">(8)</td>
                    <td class="text-sm border border-black">(9)</td>
                    <td class="text-sm border border-black">(10)</td>
                    <td class="text-sm border border-black">(11)</td>
                </tr>
            </thead>
            <tbody class="text-center">

                <?php $jumlah = 0; ?>
                @foreach($data->petugas as $d)
                <?php $jumlah += $d->nominal; ?>
                <tr>
                    <td class="border border-black p-1">{{$loop->index+1}}.</td>
                    <td class="border border-black p-1 text-left pl-4">
                        <span class="text-nowrap">{{$d->nama}}</span><br>
                        <span class="text-nowrap">{{$d->nip}}</span>
                    </td>
                    <td class="border border-black p-1">{{config('constants.SATKER')}}</td>
                    <td class="border border-black p-1 text-left">
                        {{$d->melakukan}} {{$keg->nama}} di {{$d->lokasi}}
                    </td>
                    <td class="border border-black p-1">{{$d->tgl_kunj}}</td>
                    <td class="border border-black p-1">{{$d->byk_kunj}} Kunj</td>
                    <td class="border border-black p-1">{{currency_IDR($d->nominal)}}</td>
                    <td class="border border-black p-1">Trasport Lokal</td>
                    <td class="border border-black p-1">{{$d->nama_bank}}</td>
                    <td class="border border-black p-1">{{$d->an_rek}}</td>
                    <td class="border border-black p-1">{{$d->no_rek}}</td>
                </tr>
                @endforeach

                <tr class="font-bold">
                    <td class="border border-black p-1" colspan="6">Jumlah</td>
                    <td class="border border-black p-1">{{currency_IDR($jumlah)}}</td>
                    <td class="border border-black p-1 capitalize" colspan="4">{{Terbilang::make($jumlah)}} rupiah</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="leading-normal text-lg mt-12 mx-4">
        <table class="table-auto w-full text-center text-lg">
            <tr>
                <td></td>
                <td></td>
                <td>{{config('constants.MEULABOH')}}, {{date_indo($data->tgl)}}</td>
            </tr>
            <tr>
                <td class="pb-20">Bendahara Pengeluaran</td>
                <td class="pb-20">Pejabat Pembuat Komitmen</td>
                <td class="pb-20">Pembuat Daftar,</td>
            </tr>
            <tr>
                <td>{{$ref->bend->nama}}</td>
                <td>{{$ref->ppk->nama}}</td>
                <td>{{$keg->pjk->nama}}</td>
            </tr>
            <tr>
                <td>NIP. {{$ref->bend->nip_baru}}</td>
                <td>NIP. {{$ref->ppk->nip_baru}}</td>
                <td>NIP. {{$keg->pjk->nip_baru}}</td>
            </tr>
        </table>
    </div>
</div>