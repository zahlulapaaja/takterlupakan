<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    <div class="d-flex flex-column text-xl mb-8 capitalize font-normal fs-6">
        <table class="text-left">
            <tr>
                <td>Nomor</td>
                <td class="pl-8 pr-2">:</td>
                <td>{{$data->no_spj}}</td>
            </tr>
            <tr>
                <td>Kode MAK</td>
                <td class="pl-8 pr-2">:</td>
                <td>{{$data->mak}}</td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td class="pl-8 pr-2">:</td>
                <td>{{$data->tahun}}</td>
            </tr>
        </table>
    </div>
    <div class="text-xl mb-8">Tanda Penerimaan</div>
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
            <td>Dua Ratus Sepuluh Ribu Rupiah</td>
        </tr>
        <tr>
            <td class="align-top pr-12">Yaitu untuk</td>
            <td class="align-top px-4">:</td>
            <td>
                <span>
                    Transport Lokal Pencacahan dalam {{$data->nama_kegiatan}}
                    sebanyak 3 O-K @ Rp 70.000 = Rp 210.000,-
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
            <td>{{$ref->nama_ppk}}</td>
            <td>{{'$data->nama_penerima'}}</td>
        </tr>
        <tr>
            <td>{{$ref->nip_ppk}}</td>
            <td>{{'$data->nip_penerima (kalo ada)'}}</td>
        </tr>
    </table>

    <div class="font-bold my-8">Terbilang : Rp 210.000,-</div>

    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td>Lunas dibayar</td>
        </tr>
        <tr>
            <td>Pada Tgl.</td>
        </tr>
        <tr>
            <td>Bendahara Pengeluaran</td>
        </tr>
        <tr>
            <td class="pb-20">{{config('constants.SATKER')}},</td>
        </tr>
        <tr>
            <td>{{$ref->nama_bend}}</td>
        </tr>
        <tr>
            <td>{{$ref->nip_bend}}</td>
        </tr>
    </table>
</div>