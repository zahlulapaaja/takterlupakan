<?php

use Riskihajar\Terbilang\Facades\Terbilang;
?>
@section('title')
Daftar Pengeluaran Riil
@endsection

@foreach($data->petugas as $d)
@if (!($loop->first))
<div class="page-break"></div>
@endif

<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    <div class="text-xl my-12">Daftar Pengeluaran Riil</div>
</div>
<!-- end::Header -->

<div class="leading-loose text-justify text-lg my-4">
    Yang bertanda tangan dibawah ini:
</div>

<div class="leading-normal text-lg">
    <table class="text-left">
        <tr>
            <td class="text-nowrap pr-12">Nama</td>
            <td class="px-4">:</td>
            <td>{{$d->nama}}</td>
        </tr>
        <tr>
            <td class="pr-12">NIP/SOBAT ID</td>
            <td class="px-4">:</td>
            <td>{{$d->nip}}</td>
        </tr>
        <tr>
            <td class="align-top pr-12">Jabatan</td>
            <td class="align-top px-4">:</td>
            <td>{{$d->jabatan}} {{config('constants.SATKER')}}</td>
        </tr>
        <tr>
            <td class="align-top pr-12">Kab/Kota</td>
            <td class="align-top px-4">:</td>
            <td>{{config('constants.KABUPATEN')}}</td>
        </tr>
    </table>
</div>

<div class="leading-loose text-justify text-lg my-4">
    &emsp;&emsp;&emsp;Berdasarkan Surat Tugas Nomor: {{$data->no_st}} tanggal {{date_indo($data->tgl_st)}}
    dengan ini kami menyatakan dengan sesungguhnya bahwa :
</div>

<div class="leading-normal text-lg">
    <table class="mt-4">
        <tr>
            <td class="align-top pr-4">1.</td>
            <td class="align-top">
                Biaya transport lokal petugas pendataan lapangan di bawah ini
                yang tidak dapat diperoleh bukti-bukti pengeluaran, meliputi :
                @include('kegiatan.spj._print._table-daftar-translok')
            </td>
        </tr>
        <tr>
            <td class="align-top pr-4">2.</td>
            <td class="align-top">
                Jumlah uang tersebut pada angka 1 di atas benar benar dikeluarkan untuk pelaksanaan
                perjalanan dinas dalam kota. perjalanan dinas dimaksud dan apabila dikemudian hari
                terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan
                tersebut ke kas Negara.
            </td>
        </tr>
    </table>
</div>

<div class="leading-loose text-justify text-lg my-4">
    &emsp;&emsp;&emsp;Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan
    sebagaimana mestinya.
</div>


<div class="leading-loose text-lg mt-12 mx-4">
    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td>Mengetahui/Menyetujui</td>
            <td>{{$d->jabatan}}</td>
        </tr>
        <tr>
            <td class="pb-20">Pejabat Pembuat Komitmen</td>
            <td class="pb-20">Yang Melakukan Perjalanan Dinas</td>
        </tr>
        <tr>
            <td>{{$ref->ppk->nama}}</td>
            <td>{{$d->nama}}</td>
        </tr>
        <tr>
            <td>NIP. {{$ref->ppk->nip_baru}}</td>
            <td>{{$d->nip}}</td>
        </tr>
    </table>
</div>
@endforeach