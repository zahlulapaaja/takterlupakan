<!-- begin::Header -->
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>SURAT PERNYATAAN KEGIATAN</span>
        <span>{{ $data->nama_kegiatan }}</span>
    </div>
</div>
<!-- end::Header -->

<div class="leading-loose text-justify text-lg">
    Pada hari ini, <span class="capitalize">{{$data->terbilang_tgl}}</span>,
    Saya :
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
    Dengan ini menyatakan bahwa segala tahapan kegiatan
    <span class="capitalize">{{$data->nama_kegiatan}}</span>
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
                <th class="border border-black">Banyaknya<br><?php echo '$sat'; ?></th>
                <th class="border border-black">Nama Bank</th>
                <th class="border border-black">Nama Rekening</th>
                <th class="border border-black">No. Rekening</th>
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
            @for($i = 0; $i < 10; $i++)
                <!-- kalo lebih 10 nanti atur ttd nya kekmana biar rapi -->
                <tr>
                    <td class="border border-black">no</td>
                    <td class="border border-black text-left pl-4">nama</td>
                    <td class="border border-black">gol</td>
                    <td class="border border-black">dok</td>
                    <td class="border border-black">BSI</td>
                    <td class="border border-black">nama</td>
                    <td class="border border-black">norek</td>
                </tr>
                @endfor
                <tr>
                    <td class="border border-black" colspan="2">Jumlah</td>
                    <td class="border border-black"></td>
                    <td class="border border-black">banyak</td>
                    <td class="border border-black" colspan="3"></td>
                </tr>
        </tbody>
    </table>
</div>

<div class="leading-loose text-justify text-lg">
    Oleh karena itu, kami merekomendasikan bahwa segala sesuatu yang menjadi hak
    petugas lapangan dapat diselesaikan oleh Pejabat Pembuat Komitmen (PPK) sesuai
    dengan peraturan perundang-undangan yang berlaku.
</div>

<div class="leading-loose text-justify text-lg">
    Demikian pernyataan ini kami perbuat sebagai dasar bagi Pejabat Pembuat Komitmen (PPK)
    untuk menyelesaikan hak-hak petugas lapangan.
</div>

<div class="leading-loose text-lg mt-12 mx-4">
    <div class="flex flex-row text-center ml-12">
        <div class="w-2/5"></div>
        <div class="w-3/5 flex flex-col leading-normal">
            <span>Yang membuat pernyataan,</span>
            <span class="pb-20">{{$data->pjk->jabatan}}</span>
            <span>{{$data->pjk->nama}}</span>
            <span>NIP. {{$data->pjk->nip_baru}}</span>
        </div>
    </div>
</div>