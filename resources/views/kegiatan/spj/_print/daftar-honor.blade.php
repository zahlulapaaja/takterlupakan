<!-- segera hapus  -->
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
    <div class="text-xl mb-8 capitalize">Daftar - Honor {{$data->nama_kegiatan}}</div>
</div>
<!-- end::Header -->

<div class="leading-tight text-lg mt-8">
    <table class="text-left">
        <tr>
            <td class="px-12">Program</td>
            <td class="px-4">:</td>
            <td>{{$data->pok->program}}</td>
        </tr>
        <tr>
            <td class="px-12">Kegiatan</td>
            <td class="px-4">:</td>
            <td>{{$data->pok->kegiatan}}</td>
        </tr>
        <tr>
            <td class="px-12">KRO</td>
            <td class="px-4">:</td>
            <td>{{$data->pok->output}}</td>
        </tr>
        <tr>
            <td class="px-12">RO</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{$data->pok->suboutput}}</td>
        </tr>
        <tr>
            <td class="px-12">Komponen</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{$data->pok->komponen}}</td>
        </tr>
        <tr>
            <td class="px-12">Sub Komponen</td>
            <td class="px-4">:</td>
            <td class="capitalize">{{$data->pok->subkomponen}}</td>
        </tr>
        <tr>
            <td class="px-12">Klasifikasi Belanja</td>
            <td class="px-4">:</td>
            <td>{{$data->pok->akun}}</td>
        </tr>
    </table>
</div>

<div class="leading-loose text-lg my-8 mx-4">
    <table class="table-auto w-full border border-black">
        <thead class="text-center">
            <tr>
                <th class="border border-black">No.</th>
                <th class="border border-black">Nama Petugas</th>
                <th class="border border-black">Gol.</th>
                <th class="border border-black">Honor<br>per<br><?php echo '$sat'; ?></th>
                <th class="border border-black">Banyak<br><?php echo '$sat'; ?></th>
                <th class="border border-black">Jumlah<br>Bruto<br>(Rp.)</th>
                <th class="border border-black">PPh.21<br>(Rp.)</th>
                <th class="border border-black">Jumlah<br>Neto<br>(Rp.)</th>
                <th class="border border-black">Bank</th>
                <th class="border border-black">Nama/Nomor<br>Rekening</th>
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
            </tr>
        </thead>
        <tbody class="text-center">
            @for($i = 0; $i < 10; $i++)
                <tr>
                <td class="border border-black">no</td>
                <td class="border border-black text-left pl-4">nama</td>
                <td class="border border-black">gol</td>
                <td class="border border-black">honor</td>
                <td class="border border-black">banyak</td>
                <td class="border border-black">jml</td>
                <td class="border border-black">pph</td>
                <td class="border border-black">jml lagi</td>
                <td class="border border-black">bang</td>
                <td class="border border-black">norek</td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <table class="table-auto w-full text-center text-lg">
        <tr>
            <td>Setuju dibayar:</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Pejabat Pembuat Komitmen</td>
            <td>Lunas dibayar Tgl, ..............................</td>
            <td>{{config('constants.MEULABOH')}}, {{$data->tgl_spj}}</td>
        </tr>
        <tr>
            <td class="pb-20">{{config('constants.SATKER')}},</td>
            <td class="pb-20">Bendahara Pengeluaran,</td>
            <td class="pb-20">Pembuat Daftar</td>
        </tr>
        <tr>
            <td>{{$ref->nama_ppk}}</td>
            <td>{{$ref->nama_bend}}</td>
            <td>{{'$data->nama_pjk'}}</td>
        </tr>
        <tr>
            <td>{{$ref->nip_ppk}}</td>
            <td>{{$ref->nip_bend}}</td>
            <td>{{'$data->nip_pjk'}}</td>
        </tr>
    </table>
</div>