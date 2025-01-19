<x-print-layout>

    @section('title')
    KAK
    @endsection

    <!-- begin::Cover -->
    <div class="potrait-page">
        <!-- begin::Header -->
        <div class="flex flex-col place-items-center text-center font-bold uppercase">
            <div class="d-flex flex-column mb-8">
                <div class="d-flex flex-column my-20">
                    <span class="fs-1 mb-20">KERANGKA ACUAN KERJA</span>
                    <div class="d-flex flex-column fs-2 mt-20 mx-28">
                        <!-- <span>PERJALANAN DINAS DALAM RANGKA</span> -->
                        <span>{{$data->judul}}</span>
                        <span>{{config('constants.SATKER')}} TAHUN {{$data->tahun}}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end::Header -->

        <div class="leading-normal text-justify text-lg">
            <div class="leading-loose text-lg mt-8 mx-8">
                <table class="text-left">
                    <tr>
                        <td class="pr-12 text-nowrap">Kementerian Negara/Lembaga</td>
                        <td class="px-4">:</td>
                        <td class="uppercase">{{ config('constants.INSTANSI') }}</td>
                    </tr>
                    <tr>
                        <td class="pr-12 text-nowrap">Satuan Kerja</td>
                        <td class="px-4">:</td>
                        <td class="uppercase">{{ config('constants.SATKER') }}</td>
                    </tr>
                    <tr>
                        <td class="pr-12 text-nowrap">Pembebanan</td>
                        <td class="px-4">:</td>
                        <td class="uppercase">DIPA NOMOR: {{$ref->no_dipa}}</td>
                    </tr>
                    <tr>
                        <td class="align-top pr-12">Program</td>
                        <td class="align-top px-4">:</td>
                        <td class="capitalize">{{$data->detil[0]->program}}</td>
                    </tr>
                    <tr>
                        <td class="align-top pr-12">Kegiatan</td>
                        <td class="align-top px-4">:</td>
                        <td class="capitalize">{{$data->detil[0]->kegiatan}}</td>
                    </tr>
                    <tr>
                        <td class="text-nowrap pr-12">Penanggung Jawab</td>
                        <td class="px-4">:</td>
                        <td>{{$data->pj}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="d-flex flex-row leading-normal justify-center align-items-center mt-48">
            <img class="w-24 mr-4" src="{{ image('logos/logo-bps.png') }}">
            <div class="d-flex flex-column fs-1 text-sky-500 uppercase font-bold">
                <span>{{config('constants.INSTANSI')}}</span>
                <span>{{config('constants.KABUPATEN')}}</span>
            </div>
        </div>
    </div>
    <!-- end::Cover -->

    <div class="page-break"></div>

    <!-- begin::Badan KAK -->
    <div class="potrait-page">
        <!-- begin::Header -->
        <div class="flex flex-col place-items-center text-center font-bold uppercase">
            <div class="d-flex flex-column text-xl mb-8">
                <img class="w-24 mx-auto my-4" src="{{ image('logos/logo-bps.png') }}">
                <div class="d-flex flex-column text-xl mb-8">
                    <span>KERANGKA ACUAN KERJA (KAK)</span>
                    <span>{{$data->judul}}</span>
                    <span>{{config('constants.SATKER')}} TAHUN {{$data->tahun}}</span>
                </div>
            </div>
        </div>
        <!-- end::Header -->

        <?php $no = 1; ?>
        <div class="leading-normal text-justify text-lg potrait-page">
            <table class="mt-8">
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-wrap">DASAR HUKUM</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        <table class="text-left">
                            <tr>
                                <td class="pr-4 align-top">a.</td>
                                <td>Undang-Undang Nomor 16 Tahun 1997 tentang Statistik.</td>
                            </tr>
                            <tr>
                                <td class="pr-4 align-top">b.</td>
                                <td>Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara.</td>
                            </tr>
                            <tr>
                                <td class="pr-4 align-top">c.</td>
                                <td>Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik.</td>
                            </tr>
                            <tr>
                                <td class="pr-4 align-top">d.</td>
                                <td>Peraturan Presiden Nomor 90 Tahun 2010 tentang Penyusunan RKA-KL.</td>
                            </tr>
                            <tr>
                                <td class="pr-4 align-top">e.</td>
                                <td>Peraturan Menteri Keuangan RI Nomor 51/PMK.02/2014 Perubahan atas Peraturan
                                    Menteri Keuangan Nomor Nomor 71/PMK.02/2013 tentang Pedoman Standar Biaya,
                                    Standar Struktur Biaya dan Indeksasi dalam Penyusunan Rencana Kerja dan Anggaran
                                    Kementerian Negara/Lembaga.
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-4 align-top">f.</td>
                                <td>Peraturan Menteri Keuangan RI Nomor 208/PMK.02/2019 tentng Petunjuk Penyusunan
                                    dan Penelaahan Rencana Kerja dan Anggaran Kementerian Negara/Lembaga dan Pengesahan
                                    Daftar Isian Pelaksanaan Anggaran.
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-4 align-top">g.</td>
                                <td>Peraturan Menteri Keuangan RI Nomor 49 Tahun 2023 tentang Standar Biaya Masukan Tahun Anggaran 2024.</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-nowrap">PENDAHULUAN</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">{!! nl2br($data->latar_belakang) !!}</td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">MAKSUD DAN TUJUAN</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">{!! nl2br($data->tujuan) !!}</td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-nowrap">MANFAAT</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">{!! nl2br($data->manfaat) !!}</td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">WAKTU DAN TEMPAT PELAKSANAAN</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        Waktu penyelenggaraan {{$data->judul}} dari tanggal
                        {{date_indo($data->tgl_awal)}} s.d. {{date_indo($data->tgl_akhir)}}.
                        <br>
                        Tempat pelaksanaan kegiatan diselenggarakan di {{$data->tempat}}.
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">SUMBER DANA DAN PERKIRAAN BIAYA</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        <div class="d-flex flex-row gap-3">
                            <span>a.</span>
                            <span> Sumber dana: DIPA BPS Kabupaten Aceh Barat Nomor: {{$ref->no_dipa}} Tanggal {{date_indo($ref->tgl_dipa)}}.</span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>b.</span>
                            <span> Perkiraan biaya maksimal disesuaikan dengan DIPA yang ada. </span>
                        </div>
                    </td>
                </tr>
                <!-- Skip dulu  -->
                @if(false)
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PESERTA</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        <div>
                            Pelatihan Petugas Sakernas Agustus 2024 terdiri dari 1 kelas, diikuti oleh peserta sebagai berikut:
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>a.</span>
                            <span> Petugas Sakerns Agustus 2024 dari Kabupaten Aceh Barat sebanyak 25 orang. </span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>b</span>
                            <span> Panitia sebanyak 2 orang. </span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>c.</span>
                            <span> Inda sebanyak 2 orang. </span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>d.</span>
                            <span> Total Seluruhnya sebanyak 29 Orang. </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PERSIAPAN</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        <div>
                            Persiapan administrasi :
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>a.</span>
                            <span>Setiap peserta membawa kelengkapan Surat Tugas dari BPS Kabupaten Aceh Barat; </span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>b</span>
                            <span> Persiapan Pribadi : </span>
                        </div>
                        <div class="d-flex flex-row gap-3 ms-8">
                            <span>i.</span>
                            <span> Pakaian pada waktu pembukaan menggunakan batik lengan panjang dan selama pelaksanaan kegiatan bebas rapi; </span>
                        </div>
                        <div class="d-flex flex-row gap-3 ms-8">
                            <span>ii.</span>
                            <span> Selama dalam acara pertemuan diwajibkan mengenakan sepatu, mengubah handphone dalam nada diam, tidak bertelepon dalam ruang kegiatan, dan berperilaku sesuai dengan etika kesopanan. </span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>c.</span>
                            <span> Transport dan Akomodasi Peserta </span>
                        </div>
                        <div class="d-flex flex-row gap-3 ms-8">
                            <span>i.</span>
                            <span> Panitia menyediakan transport lokal sesuai aturan yang berlaku. </span>
                        </div>
                        <div class="d-flex flex-row gap-3 ms-8">
                            <span>ii.</span>
                            <span> Panitia menyediakan penginapan karena pelatihan diadakan fullboard </span>
                        </div>
                        <div class="d-flex flex-row gap-3">
                            <span>d.</span>
                            <span> Seluruh peserta pelatihan akan memperoleh materi yang akan disampaikan oleh Instruktur Daerah. </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">AKOMODASI, KONSUMSI, DAN LAINNYA</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        Konsumsi dan akomodasi selama pelaksanaan ditanggung oleh Panitia Penyelenggara.
                    </td>
                </tr>
                @endif
                <!-- Skip dulu  -->
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PEMBIAYAAN</td>
                    <td class="align-top py-2 pl-20">:</td>
                    <td class="align-top p-2">
                        Pembiayaan kegiatan dibebankan pada DIPA {{config('constants.SATKER')}} Tahun Anggaran {{$data->tahun}},
                        Program : (054.01.{{$data->detil[0]->kode_program}}) {{$data->detil[0]->program}},
                        ({{$data->detil[0]->kode_kegiatan}}.{{$data->detil[0]->kode_output}}.{{$data->detil[0]->kode_suboutput}})
                        {{$data->detil[0]->suboutput}}, Akun
                        @foreach($data->detil as $d)
                        @if($loop->first || ($d->kode_akun != $akun))
                        {{$d->kode_akun}}{{($loop->last) ? '.' : ','}}
                        @endif
                        <?php $akun = $d->kode_akun; ?>
                        @endforeach
                    </td>
                </tr>
            </table>

            <!-- begin::RAB -->
            <div>
                <div class="leading-tight text-lg my-8">
                    <table class="text-left">
                        <tr>
                            <td class="px-12">Program</td>
                            <td class="px-4">:</td>
                            <td>{{$data->detil[0]->program}}</td>
                        </tr>
                        <tr>
                            <td class="px-12">Kegiatan</td>
                            <td class="px-4">:</td>
                            <td>{{$data->detil[0]->kegiatan}}</td>
                        </tr>
                        <tr>
                            <td class="px-12 text-nowrap">Klasifikasi Rincian Output (KRO)</td>
                            <td class="px-4">:</td>
                            <td>{{$data->detil[0]->output}}</td>
                        </tr>
                        <tr>
                            <td class="px-12 text-nowrap align-top">Rincian Output (RO)</td>
                            <td class="px-4 align-top">:</td>
                            <td class="capitalize">{{$data->detil[0]->suboutput}}</td>
                        </tr>
                        <tr>
                            <td class="px-12">Komponen</td>
                            <td class="px-4">:</td>
                            <td class="capitalize">{{$data->detil[0]->komponen}}</td>
                        </tr>
                        <tr>
                            <td class="px-12">Sub Komponen</td>
                            <td class="px-4">:</td>
                            <td class="capitalize">{{$data->detil[0]->subkomponen}}</td>
                        </tr>
                    </table>
                </div>

                <div class="leading-normal text-justify text-lg">
                    <div class="mx-12">
                        <table class="w-full border text-center font-medium">
                            <thead>
                                <tr style="background:#DDD9C3;">
                                    <th class="border border-black p-2 font-bold">Akun</th>
                                    <th class="border border-black p-2 font-bold">Rincian</th>
                                    <th class="border border-black p-2 font-bold">Vol</th>
                                    <th class="border border-black p-2 font-bold">Satuan</th>
                                    <th class="border border-black p-2 font-bold">Harga Satuan</th>
                                    <th class="border border-black p-2 font-bold">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->detil as $d)
                                @if($loop->first || ($d->kode_akun != $akun))
                                <tr class="font-bold">
                                    <td class="border border-black p-2">{{$d->kode_akun}}</td>
                                    <td colspan="5" class="border border-black text-left p-2">{{$d->akun}}</td>
                                </tr>
                                @endif
                                <tr class="fs-7">
                                    <td class="border border-black px-2"></td>
                                    <td class="border border-black text-left px-2">{{$d->item_kegiatan}}</td>
                                    <td class="border border-black px-2">{{$d->volume}}</td>
                                    <td class="border border-black px-2">{{$d->satuan}}</td>
                                    <td class="border border-black px-2">{{currency_IDR($d->harga)}}</td>
                                    <td class="border border-black px-2 text-right">{{currency_IDR($d->jumlah)}}</td>
                                </tr>
                                <?php $akun = $d->kode_akun; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end::RAB -->

            <!-- begin::Pengesahan -->
            <table class="table-auto w-full text-center text-lg mt-8">
                <tr>
                    <td>Mengetahui,</td>
                    <td>{{config('constants.MEULABOH')}}, {{date_indo($data->tgl)}}</td>
                </tr>
                <tr>
                    <td class="pb-20">Kuasa Pengguna Anggaran</td>
                    <td class="pb-20">Pejabat Pembuat Komitmen</td>
                </tr>
                <tr>
                    <td>{{$ref->kpa->nama}}</td>
                    <td>{{$ref->ppk->nama}}</td>
                </tr>
                <tr>
                    <td>NIP. {{$ref->kpa->nip_baru}}</td>
                    <td>NIP. {{$ref->ppk->nip_baru}}</td>
                </tr>
            </table>
            <!-- end::Pengesahan -->
        </div>
    </div>
    <!-- end::Badan KAK -->

</x-print-layout>