<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>SURAT PERNYATAAN KEGIATAN</span>
        <span>{{ $keg->nama }}</span>
    </div>
</div>
<!-- end::Header -->

<div class="leading-normal text-justify text-lg">
    Pada hari ini, <span class="capitalize">{{$data->terbilang_tgl}}</span>,
    Saya :
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
    Dengan ini menyatakan bahwa segala tahapan kegiatan
    <span class="capitalize">{{$keg->nama}}</span>
    telah selesai dilaksanakan dengan baik dan sesuai dengan standar
    prosedur pelaksanaan. Adapun rinciannya adalah sebagai berikut :
</div>

<div class="leading-normal text-lg my-8 mx-4">
    <table class="table-auto w-full border border-black">
        <thead class="text-center">
            <tr>
                <th class="border border-black">No.</th>
                <th class="border border-black">Nama Petugas</th>
                <th class="border border-black">Gol.</th>
                <th class="border border-black">Banyaknya<br>{{$keg->pok->satuan}}</th>
                <th class="border border-black">Nama Bank</th>
                <th class="border border-black">Nama Pemilik<br>Rekening</th>
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
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $jumlah = 0; ?>
            @foreach($data->petugas as $d)
            <!-- kalo lebih 10 nanti atur ttd nya kekmana biar rapi -->

            @if($d->checkbox == 1)
            <?php $jumlah += $d->beban; ?>
            <tr>
                <td class="border border-black">{{ $loop->index+1 }}</td>
                <td class="border border-black text-left pl-4">{{$d->nama}}</td>
                <td class="border border-black">{{$d->gol}}</td>
                <td class="border border-black">{{$d->beban}}</td>
                <td class="border border-black">{{$d->nama_bank}}</td>
                <td class="border border-black">{{$d->an_rek}}</td>
                <td class="border border-black">{{$d->no_rek}}</td>
            </tr>
            @endif
            @endforeach
            <tr>
                <td class="border border-black" colspan="2">Jumlah</td>
                <td class="border border-black"></td>
                <td class="border border-black">{{$jumlah}}</td>
                <td class="border border-black" colspan="3"></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="leading-normal text-justify text-lg mb-2">
    Oleh karena itu, kami merekomendasikan bahwa segala sesuatu yang menjadi hak
    petugas lapangan dapat diselesaikan oleh Pejabat Pembuat Komitmen (PPK) sesuai
    dengan peraturan perundang-undangan yang berlaku.
</div>

<div class="leading-normal text-justify text-lg">
    Demikian pernyataan ini kami perbuat sebagai dasar bagi Pejabat Pembuat Komitmen (PPK)
    untuk menyelesaikan hak-hak petugas lapangan.
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <div class="flex flex-row text-center ml-12">
        <div class="w-2/5"></div>
        <div class="w-3/5 flex flex-col leading-normal">
            <span>Yang membuat pernyataan,</span>
            <span class="pb-20">{{$keg->pjk->jabatan}}</span>
            <span>{{$keg->pjk->nama}}</span>
            <span>NIP. {{$keg->pjk->nip_baru}}</span>
        </div>
    </div>
</div>