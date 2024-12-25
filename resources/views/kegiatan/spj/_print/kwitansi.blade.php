<?php

use Riskihajar\Terbilang\Facades\Terbilang;
?>

@foreach($data->petugas as $d)
@if (!($loop->first))
<div class="page-break"></div>
@endif

<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    <div class="d-flex flex-column text-xl mb-8 capitalize font-normal fs-6">
        <table class="text-left">
            <tr>
                <td>Nomor</td>
                <td class="pl-8 pr-2">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Kode MAK</td>
                <td class="pl-8 pr-2">:</td>
                <td>054.01.GG.{{$keg->mak}}</td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td class="pl-8 pr-2">:</td>
                <td>{{$data->tahun}}</td>
            </tr>
        </table>
    </div>
    <div class="text-xl mb-4">Tanda Penerimaan</div>
</div>
<!-- end::Header -->

<div class="leading-loose text-lg mt-8">
    <table class="text-left">
        <tr>
            <td class="text-nowrap pr-12">Sudah terima dari</td>
            <td class="px-4">:</td>
            <td>Kuasa Pengguna Anggaran {{config('constants.SATKER')}}</td>
        </tr>
        <tr>
            <td class="pr-12">Uang sebanyak</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{Terbilang::make($d->nominal)}} rupiah</td>
        </tr>
        <tr>
            <td class="align-top pr-12">Yaitu untuk</td>
            <td class="align-top px-4">:</td>
            <td>
                <span>
                    Transport Lokal {{$d->melakukan}} dalam {{$keg->nama}}
                    sebanyak {{$d->byk_kunj}} {{$keg->pok->satuan}}
                    @ {{currency_IDR($d->nominal/$d->byk_kunj)}} = {{currency_IDR($d->nominal)}},-
                </span>
                <br>
                <span>Sebagaimana surat tugas terlampir</span>
            </td>
        </tr>
    </table>
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td>Setuju dibayar:</td>
            <td>{{config('constants.MEULABOH')}}, ........................ {{$data->tahun}}</td>
        </tr>
        <tr>
            <td>Pejabat Pembuat Komitmen</td>
            <td>Yang Menerima, </td>
        </tr>
        <tr>
            <td class="pb-20">{{config('constants.SATKER')}},</td>
            <td class="pb-20"></td>
        </tr>
        <tr>
            <td>{{$ref->ppk->nama}}</td>
            <td>{{$d->nama}}</td>
        </tr>
        <tr>
            <td>{{$ref->ppk->nip_baru}}</td>
            <td>{{$d->nip}}</td>
        </tr>
    </table>

    <div class="font-bold my-8">Terbilang : {{currency_IDR($d->nominal)}},-</div>

    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td class="text-left pl-80">
                <span>Lunas dibayar</span><br>
                <span>Pada Tgl.</span>
            </td>
        </tr>
        <tr>
            <td class="pb-20">
                <span>Bendahara Pengeluaran</span><br>
                <span>{{config('constants.SATKER')}},</span>
            </td>
        </tr>
        <tr>
            <td>
                <span>{{$ref->bend->nama}}</span><br>
                <span>{{$ref->bend->nip_baru}}</span>
            </td>
        </tr>
    </table>
</div>
@endforeach