<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>SURAT TUGAS</span>
        <span>NOMOR : {{ '$data->surat-tugas' }}</span>
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
                {{$data->nama_kegiatan}} dengan jadwal dari
                {{$data->tgl_mulai}} sampai dengan {{$data->tgl_akhir}}
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
            <td>{{$data->mak}}</td>
        </tr>
    </table>
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <div class="flex flex-row text-center ml-12">
        <div class="w-2/5"></div>
        <div class="w-3/5 flex flex-col leading-normal">
            <span>{{config('constants.MEULABOH')}}, {{$data->tgl_spj}}</span>
            <span class="pb-20">Kepala</span>
            <span class="font-bold">{{$ref->nama_kpa}}</span>
            <span>NIP. {{$ref->nip_kpa}}</span>
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

<div class="leading-loose text-lg">
    <table class="text-left">
        <tr>
            <td class="pr-4">Nomor</td>
            <td class="px-4">:</td>
            <td>{{$data->no}}</td>
        </tr>
        <tr>
            <td class="pr-4">Tanggal</td>
            <td class="px-4">:</td>
            <td>{{$data->tgl_spj}}</td>
        </tr>
    </table>
</div>

<div class="leading-normal text-lg my-8 mx-4">
    <table class="table-auto w-full border border-black">
        <thead class="text-center">
            <tr>
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
            @for($i = 0; $i < 5; $i++)
                <tr>
                <td class="border border-black align-top">{{$i+1}}.</td>
                <td class="border border-black text-left align-top text-nowrap p-2">
                    <span>Tika Widya Wardani, SE</span> <br>
                    <span>NIP. 198807112014032003</span>
                </td>
                <td class="border border-black text-left text-nowrap p-2">
                    <span>Dari : {{$data->tgl_mulai}}</span> <br>
                    <span>Sampai : {{$data->tgl_akhir}}</span> <br>
                    <span>Kunj : 1 kunj.</span>
                </td>
                <td class="border border-black text-left align-top p-2">
                    Dalam Rangka {{$data->nama_kegiatan}}
                    di Kec. Johan Pahlawan
                </td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <div class="flex flex-row text-center ml-12">
        <div class="w-2/5"></div>
        <div class="w-3/5 flex flex-col leading-normal">
            <span>{{config('constants.MEULABOH')}}, {{$data->tgl_spj}}</span>
            <span class="pb-20">Kepala</span>
            <span class="font-bold">{{$ref->nama_kpa}}</span>
            <span>NIP. {{$ref->nip_kpa}}</span>
        </div>
    </div>
</div>
<!-- end::Lampiran -->