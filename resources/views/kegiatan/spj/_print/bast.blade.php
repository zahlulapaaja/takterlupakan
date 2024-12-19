<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>BERITA ACARA PENYELESAIAN TUGAS</span>
        <span>{{ $data->nama_kegiatan }}</span>
    </div>
</div>
<!-- end::Header -->

<div class="leading-loose text-justify text-lg">
    Pada hari ini, <span class="capitalize">{{$data->terbilang_tgl}}</span>
    bertempat di Kantor {{config('constants.INSTANSI')}}
    {{config('constants.KABUPATEN')}}, antara :
</div>

<div class="leading-loose text-lg my-4">
    <table class="text-left">
        <tr>
            <td class="pr-12">Nama</td>
            <td class="px-4">:</td>
            <td>{{$data->pjk->nama}}</td>
        </tr>
        <tr>
            <td class="pr-12">NIP</td>
            <td class="px-4">:</td>
            <td>{{$data->pjk->nip_baru}}</td>
        </tr>
        <tr>
            <td class="pr-12">Gol/Pangkat</td>
            <td class="px-4">:</td>
            <td>{{$data->pjk->golongan}}/{{$data->pjk->pangkat}}</td>
        </tr>
        <tr>
            <td class="pr-12">Jabatan</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{$data->pjk->jabatan}}</td>
        </tr>
    </table>
</div>

<div class="leading-loose text-justify text-lg">
    Selanjutnya disebut <span class="font-bold">PIHAK PERTAMA</span>
</div>

<div class="leading-loose text-lg my-4">
    <table class="text-left">
        <tr>
            <td class="pr-12">Nama</td>
            <td class="px-4">:</td>
            <td>{{$ref->nama_ppk}}</td>
        </tr>
        <tr>
            <td class="pr-12">NIP</td>
            <td class="px-4">:</td>
            <td>{{$ref->nip_ppk}}</td>
        </tr>
        <tr>
            <td class="pr-12">Gol/Pangkat</td>
            <td class="px-4">:</td>
            <td>golongan/pangkat ppk belom ada</td>
        </tr>
        <tr>
            <td class="pr-12">Jabatan</td>
            <td class="px-4">:</td>
            <td class="capitalize">jabatan ppk belom ada</td>
        </tr>
    </table>
</div>

<div class="leading-loose text-justify text-lg">
    Selanjutnya disebut <span class="font-bold">PIHAK KEDUA</span>
</div>

<div class="leading-loose text-justify text-lg mt-8">
    Telah bersepakat untuk menyelesaikan administrasi dalam rangka kegiatan
    <span class="uppercase">{{$data->nama_kegiatan}}</span>
    dengan ketentuan :
</div>

<div class="leading-loose text-lg">
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
                tugasnya dalam kegiatan <span class="uppercase">{{$data->nama_kegiatan}}</span>
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


<div class="leading-loose text-justify text-lg mt-8">
    Demikianlah berita acara ini kami perbuat sebagai bentuk tanggung jawab masing-masing pihak dalam
    rangka kegiatan <span class="uppercase">{{$data->nama_kegiatan}}</span>.
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td class="pb-20">PIHAK PERTAMA</td>
            <td class="pb-20">PIHAK KEDUA</td>
        </tr>
        <tr>
            <td>{{$data->pjk->nama}}</td>
            <td>{{$ref->nama_ppk}}</td>
        </tr>
        <tr>
            <td>{{$data->pjk->nip_baru}}</td>
            <td>{{$ref->nip_ppk}}</td>
        </tr>
    </table>
</div>

<div class="page-break"></div>