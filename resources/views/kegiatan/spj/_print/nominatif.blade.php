<div class="landscape-page">
    <!-- begin::Header -->
    <div class="flex flex-col place-items-center text-center font-bold uppercase">
        <div class="w-full flex flex-row-reverse font-normal mb-8">
            <div class="w-1/2 text-justify">
                PERATURAN DIREKTUR JENDERAL PERBENDAHARAAN NOMOR PER-22/PB/2013 TENTANG KETENTUAN
                LEBIH LANJUT PELAKSANAAN PERJALANAN DINAS DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI NEGERI
                DAN PEGAWAI TIDAK TETAP
            </div>
        </div>
        <div class="w-full text-left text-xl capitalize ml-8">Daftar - Transport Lokal {{$data->nama_kegiatan}}</div>
    </div>
    <!-- end::Header -->

    <div class="leading-tight text-lg mt-4">
        <table class="text-left">
            <tr>
                <td class="pl-4 pr-12">Program</td>
                <td class="px-4">:</td>
                <td>{{$data->pok->program}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Kegiatan</td>
                <td class="px-4">:</td>
                <td>{{$data->pok->kegiatan}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">KRO</td>
                <td class="px-4">:</td>
                <td>{{$data->pok->output}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">RO</td>
                <td class="px-4">:</td>
                <td class="capitalize">{{$data->pok->suboutput}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Komponen</td>
                <td class="px-4">:</td>
                <td class="capitalize">{{$data->pok->komponen}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Sub Komponen</td>
                <td class="px-4">:</td>
                <td class="capitalize">{{$data->pok->subkomponen}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Akun</td>
                <td class="px-4">:</td>
                <td>{{$data->pok->akun}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Satuan Kerja</td>
                <td class="px-4">:</td>
                <td>{{config('constants.SATKER')}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Kementerian/Lembaga</td>
                <td class="px-4">:</td>
                <td>{{config('constants.INSTANSI')}}</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Nomor Surat Tugas</td>
                <td class="px-4">:</td>
                <td>$no_surat_tugas</td>
            </tr>
            <tr>
                <td class="pl-4 pr-12">Tanggal</td>
                <td class="px-4">:</td>
                <td>{{$data->tgl_spj}}</td>
            </tr>
        </table>
    </div>

    <div class="leading-loose text-lg my-8 mx-4">
        <table class="table-auto w-full border border-black">
            <thead class="text-center">
                <tr>
                    <th class="border border-black">No.</th>
                    <th class="border border-black">Pelaksana SPD/<br>NIP</th>
                    <th class="border border-black">Asal<br>Penugasan</th>
                    <th class="border border-black">Tujuan<br>Perjalanan</th>
                    <th class="border border-black">Tgl Kunj</th>
                    <th class="border border-black">Banyak Kunj</th>
                    <th class="border border-black">Nominal<br>(Rp.)</th>
                    <th class="border border-black">Berita</th>
                    <th class="border border-black">Bank</th>
                    <th class="border border-black">Nama<br>Rekening</th>
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
                    <td class="text-sm border border-black">(8)</td>
                    <td class="text-sm border border-black">(9)</td>
                    <td class="text-sm border border-black">(10)</td>
                    <td class="text-sm border border-black">(11)</td>
                </tr>
            </thead>
            <tbody class="text-center">
                @for($i = 0; $i < 5; $i++)
                    <tr>
                    <td class="border border-black">no</td>
                    <td class="border border-black text-left pl-4">nama</td>
                    <td class="border border-black">asal</td>
                    <td class="border border-black">tujuan</td>
                    <td class="border border-black">tanggal</td>
                    <td class="border border-black">banyaknya</td>
                    <td class="border border-black">nominal</td>
                    <td class="border border-black">berita</td>
                    <td class="border border-black">bang</td>
                    <td class="border border-black">rek a.n.</td>
                    <td class="border border-black">norek</td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>

    <div class="leading-loose text-lg mt-12 mx-4">
        <table class="table-auto w-full text-center text-lg">
            <tr>
                <td></td>
                <td></td>
                <td>{{config('constants.MEULABOH')}}, {{$data->tgl_spj}}</td>
            </tr>
            <tr>
                <td class="pb-20">Bendahara Pengeluaran</td>
                <td class="pb-20">Pejabat Pembuat Komitmen</td>
                <td class="pb-20">Pembuat Daftar,</td>
            </tr>
            <tr>
                <td>{{$ref->nama_bend}}</td>
                <td>{{$ref->nama_ppk}}</td>
                <td>{{'$data->nama_pjk'}}</td>
            </tr>
            <tr>
                <td>NIP. {{$ref->nip_bend}}</td>
                <td>NIP. {{$ref->nip_ppk}}</td>
                <td>NIP. {{'$data->nip_pjk'}}</td>
            </tr>
        </table>
    </div>
</div>