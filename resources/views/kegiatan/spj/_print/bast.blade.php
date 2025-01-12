<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>BERITA ACARA PENYELESAIAN TUGAS</span>
        <span>{{ $keg->nama }}</span>
    </div>
</div>
<!-- end::Header -->

<div class="leading-normal text-justify text-lg">
    Pada hari ini, <span class="capitalize">{{$ref->terbilang_tgl}}</span>
    bertempat di Kantor {{config('constants.INSTANSI')}}
    {{config('constants.KABUPATEN')}}, antara :
</div>

<div class="leading-normal text-lg my-4">
    <table class="text-left">
        <tr>
            <td class="pr-12">Nama</td>
            <td class="px-4">:</td>
            <td>{{$keg->pjk->nama}}</td>
        </tr>
        <tr>
            <td class="pr-12">NIP</td>
            <td class="px-4">:</td>
            <td>{{$keg->pjk->nip_baru}}</td>
        </tr>
        <tr>
            <td class="pr-12">Gol/Pangkat</td>
            <td class="px-4">:</td>
            <td>{{$keg->pjk->golongan}} / {{$keg->pjk->pangkat}}</td>
        </tr>
        <tr>
            <td class="pr-12">Jabatan</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{$keg->pjk->jabatan}}</td>
        </tr>
    </table>
</div>

<div class="leading-normal text-justify text-lg">
    Selanjutnya disebut <span class="font-bold">PIHAK PERTAMA</span>
</div>

<div class="leading-normal text-lg my-4">
    <table class="text-left">
        <tr>
            <td class="pr-12">Nama</td>
            <td class="px-4">:</td>
            <td>{{$ref->ppk->nama}}</td>
        </tr>
        <tr>
            <td class="pr-12">NIP</td>
            <td class="px-4">:</td>
            <td>{{$ref->ppk->nip_baru}}</td>
        </tr>
        <tr>
            <td class="pr-12">Gol/Pangkat</td>
            <td class="px-4">:</td>
            <td>{{$ref->ppk->golongan}} / {{$ref->ppk->pangkat}}</td>
        </tr>
        <tr>
            <td class="pr-12">Jabatan</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{$ref->ppk->jabatan}}</td>
        </tr>
    </table>
</div>

<div class="leading-normal text-justify text-lg">
    Selanjutnya disebut <span class="font-bold">PIHAK KEDUA</span>
</div>

<div class="leading-normal text-justify text-lg mt-8">
    Telah bersepakat untuk menyelesaikan administrasi dalam rangka kegiatan
    <span class="uppercase">{{$keg->nama}}</span>
    dengan ketentuan :
</div>

<div class="leading-normal text-lg">
    <table class="w-full text-justify">
        <tr>
            <td class="align-top px-2">1.</td>
            <td>
                PIHAK PERTAMA menyatakan bahwa pekerjaan yang menjadi tanggung jawab dan wewenangnya
                telah dilaksanakan dengan baik sesuai dengan prosedur yang berlaku;
            </td>
        </tr>
        <tr>
            <td class="align-top px-2">2.</td>
            <td>
                PIHAK PERTAMA menyerahkan nama-nama petugas lapangan sesuai dengan jabatan dan wilayah
                tugasnya dalam kegiatan <span class="uppercase">{{$keg->nama}}</span>
            </td>
        </tr>
        <tr>
            <td class="align-top px-2">3.</td>
            <td>
                PIHAK KEDUA, setelah menerima dokumen administrasi pendukung dari PIHAK PERTAMA dan
                dinyatakan lengkap, maka akan segera membuat dan melunasi hak-hak petugas.
            </td>
        </tr>
    </table>
</div>


<div class="leading-normal text-justify text-lg mt-8">
    Demikianlah berita acara ini kami perbuat sebagai bentuk tanggung jawab masing-masing pihak dalam
    rangka kegiatan <span class="uppercase">{{$keg->nama}}</span>.
</div>

<div class="leading-normal text-lg mt-12 mx-4">
    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td class="pb-20">PIHAK PERTAMA</td>
            <td class="pb-20">PIHAK KEDUA</td>
        </tr>
        <tr>
            <td>{{$keg->pjk->nama}}</td>
            <td>{{$ref->ppk->nama}}</td>
        </tr>
        <tr>
            <td>{{$keg->pjk->nip_baru}}</td>
            <td>{{$ref->ppk->nip_baru}}</td>
        </tr>
    </table>
</div>