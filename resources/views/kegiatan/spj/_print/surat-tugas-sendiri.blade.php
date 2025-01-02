@section('title')
Surat Tugas
@endsection

<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>SURAT TUGAS</span>
        <span>NOMOR : {{$data->no_st}}</span>
    </div>
</div>
<!-- end::Header -->

<div class="leading-loose text-justify text-lg">
    Yang bertanda tangan dibawah ini:
</div>

<div class="w-full text-xl text-center font-bold uppercase my-4">
    KEPALA {{config('constants.INSTANSI')}} {{config('constants.KABUPATEN')}}
</div>

<div class="leading-loose text-justify text-lg">
    Memberi tugas kepada:
</div>

<div class="leading-loose text-lg mt-8">
    <table class="text-left">
        <tr>
            <td class="pr-12">Nama</td>
            <td class="px-4">:</td>
            <td>{{$data->petugas[0]->nama}}</td>
        </tr>
        <tr>
            <td class="pr-12">NIP</td>
            <td class="px-4">:</td>
            <td>{{substr($data->petugas[0]->nip,-18)}}</td>
        </tr>
        <tr>
            <td class="pr-12">Tujuan/Tugas</td>
            <td class="px-4">:</td>
            <td>{{$data->petugas[0]->lokasi}} / {{$data->petugas[0]->melakukan}}</td>
        </tr>
        <tr>
            <td class="align-top pr-12">Kegiatan</td>
            <td class="align-top px-4">:</td>
            <td class="capitalize">{{$keg->nama}}</td>
        </tr>
        <tr>
            <td class="text-nowrap pr-12">Waktu/Tanggal Dinas</td>
            <td class="px-4">:</td>
            <td>{{date_indo($keg->tgl_mulai)}} s.d. {{date_indo($keg->tgl_akhir)}} ({{$data->petugas[0]->byk_kunj}} kunj.)</td>
        </tr>
        <tr>
            <td class="pr-12">Mata Anggaran</td>
            <td class="px-4">:</td>
            <td>{{$keg->mak}}</td>
        </tr>
    </table>
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <div class="flex flex-row text-center ml-12">
        <div class="w-2/5"></div>
        <div class="w-3/5 flex flex-col leading-normal">
            <span>{{config('constants.MEULABOH')}}, {{date_indo($data->tgl_st)}}</span>
            <span class="pb-20">Kepala</span>
            <span class="font-bold">{{$ref->kpa->nama}}</span>
            <span>NIP. {{$ref->kpa->nip_baru}}</span>
        </div>
    </div>
</div>