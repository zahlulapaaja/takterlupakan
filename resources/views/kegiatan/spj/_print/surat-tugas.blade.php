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
            <td><span class="italic">Terlampir</span></td>
        </tr>
        <tr>
            <td class="pr-12">NIP</td>
            <td class="px-4">:</td>
            <td><span class="italic">Terlampir</span></td>
        </tr>
        <tr>
            <td class="pr-12">Tujuan/Tugas</td>
            <td class="px-4">:</td>
            <td><span class="italic">Terlampir</span></td>
        </tr>
        <tr>
            <td class="align-top pr-12">Kegiatan</td>
            <td class="align-top px-4">:</td>
            <td>
                <span class="capitalize">{{$keg->nama}}</span> dengan jadwal dari
                {{date_indo($keg->tgl_mulai)}} sampai dengan {{date_indo($keg->tgl_akhir)}}
            </td>
        </tr>
        <tr>
            <td class="text-nowrap pr-12">Waktu/Tanggal Dinas</td>
            <td class="px-4">:</td>
            <td><span class="italic">Terlampir</span></td>
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

<div class="page-break"></div>

<!-- begin::Lampiran -->
<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
</div>
<!-- end::Header -->

<div class="leading-loose text-justify text-lg font-bold">
    Lampiran Surat Tugas
</div>

<div class="leading-tight text-lg">
    <table class="text-left">
        <tr>
            <td class="pr-4">Nomor</td>
            <td class="px-4">:</td>
            <td>{{$data->no_st}}</td>
        </tr>
        <tr>
            <td class="pr-4">Tanggal</td>
            <td class="px-4">:</td>
            <td>{{date_indo($data->tgl_st)}}</td>
        </tr>
    </table>
</div>

<div class="leading-normal text-lg my-8 mx-4">
    <table class="table-auto w-full border border-black">
        <thead class="text-center">
            <tr class="py-2">
                <th class="border border-black">No.</th>
                <th class="border border-black">Nama Petugas</th>
                <th class="border border-black">Jadwal Kegiatan</th>
                <th class="border border-black">Keterangan</th>
            </tr>
            <tr>
                <td class="text-sm border border-black">(1)</td>
                <td class="text-sm border border-black">(2)</td>
                <td class="text-sm border border-black">(3)</td>
                <td class="text-sm border border-black">(4)</td>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($data->petugas as $d)
            <tr>
                <td class="border border-black align-top">{{$loop->index+1}}.</td>
                <td class="border border-black text-left align-top text-nowrap p-2">
                    <span>{{$d->nama}}</span> <br>
                    <span>{{$d->nip}}</span>
                </td>
                <td class="border border-black text-left text-nowrap p-2">
                    <span>Dari : {{date_indo($keg->tgl_mulai)}}</span> <br>
                    <span>Sampai : {{date_indo($keg->tgl_akhir)}}</span> <br>
                    <span>Kunj : {{$d->byk_kunj}} kunj.</span>
                </td>
                <td class="border border-black text-left align-top p-2">
                    Dalam Rangka {{$d->melakukan}} {{$keg->nama}}
                    di {{$d->lokasi}}
                </td>
            </tr>
            @endforeach
        </tbody>
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
<!-- end::Lampiran -->