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
            <div class="d-flex flex-column fs-1 text-sky-500 uppercase italic font-bold">
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
            <table class="mt-4">
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-wrap">DASAR HUKUM</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">
                        <table class="text-left">
                            @foreach(config('constants.DASAR_HUKUM') as $key => $value)
                            <tr>
                                <td class="pr-4 align-top">{{$key}}.</td>
                                <td>{{$value}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="pr-4 align-top">j.</td>
                                <td>{{$ref->pmk}};</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-nowrap">PENDAHULUAN</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">{!! nl2br($data->latar_belakang) !!}</td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">MAKSUD DAN TUJUAN</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">{!! nl2br($data->tujuan) !!}</td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-nowrap">TARGET/SASARAN</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">{!! nl2br($data->target) !!}</td>
                </tr>
                @if($data->jenis == 'pengadaan')
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">METODE PENGADAAN BARANG/JASA</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">{!! nl2br($data->metode) !!}</td>
                </tr>
                @endif
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">WAKTU DAN TEMPAT PELAKSANAAN</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">
                        Waktu penyelenggaraan {{$data->judul}}
                        @if($data->tgl_akhir == null)
                        pada tanggal {{date_indo($data->tgl_awal)}}.
                        @else
                        dari tanggal {{date_indo($data->tgl_awal)}} sampai dengan {{date_indo($data->tgl_akhir)}}.
                        @endif
                        <br>
                        Tempat pelaksanaan kegiatan diselenggarakan di {{$data->tempat}}.
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">SUMBER DANA DAN PERKIRAAN BIAYA</td>
                    <td class="align-top py-2 pl-10">:</td>
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
                @if($data->jenis == 'perjadin')
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PESERTA</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">
                        <span class="block mb-1">Pegawai yang melaksanakan kegiatan adalah sebagai berikut:</span>
                        <table class="w-full border text-center font-medium">
                            <thead>
                                <tr class="fs-6">
                                    <th class="border border-black p-2 font-bold">No</th>
                                    <th class="border border-black p-2 font-bold">Pelaksana</th>
                                    <th class="border border-black p-2 font-bold">Tanggal</th>
                                    <th class="border border-black p-2 font-bold">Tujuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->peserta as $p)
                                <tr class="fs-7">
                                    <td class="border border-black align-top px-2">{{$loop->index+1}}.</td>
                                    <td class="border border-black align-top text-left px-2">
                                        <p>{{$p->nama}}</p>
                                        <p class="text-nowrap">NIP. {{$p->nip_baru}}</p>
                                    </td>
                                    <td class="border border-black px-2">
                                        @if($data->tgl_akhir == null)
                                        {{date_indo($data->tgl_awal)}}
                                        @else
                                        {{date_indo($data->tgl_awal)}} s.d. {{date_indo($data->tgl_akhir)}}
                                        @endif
                                    </td>
                                    <td class="border border-black px-2">{{$data->tempat}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endif
                @if($data->jenis == 'pelatihan')
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PESERTA</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">{!! nl2br($data->pelatihan->peserta) !!}</td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PERSIAPAN</td>
                    <td class="align-top py-2 pl-10">:</td>
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
                        @if($data->pelatihan->translok)
                        <div class="d-flex flex-row gap-3 ms-8">
                            <span>i.</span>
                            <span> Panitia menyediakan transport lokal sesuai aturan yang berlaku. </span>
                        </div>
                        @endif
                        @if($data->pelatihan->akomodasi)
                        <div class="d-flex flex-row gap-3 ms-8">
                            <span>ii.</span>
                            <span> Panitia menyediakan penginapan karena pelatihan diadakan fullboard </span>
                        </div>
                        @endif
                        <div class="d-flex flex-row gap-3">
                            <span>d.</span>
                            <span> Seluruh peserta pelatihan akan memperoleh materi yang akan disampaikan oleh Instruktur Daerah/Nasional. </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">AKOMODASI, KONSUMSI, DAN LAINNYA</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">
                        Konsumsi
                        @if($data->pelatihan->akomodasi)
                        dan akomodasi
                        @endif
                        selama pelaksanaan ditanggung oleh Panitia Penyelenggara.
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PEMBIAYAAN</td>
                    <td class="align-top py-2 pl-10">:</td>
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
                <tr>
                    <td class="align-top font-bold p-2"></td>
                    <td colspan="3">
                        <!-- begin::RAB -->
                        <div class="leading-tight text-lg mx-2 my-4">
                            <table class="text-left fs-6">
                                <tr>
                                    <td class="pr-12">Program</td>
                                    <td class="px-4">:</td>
                                    <td>{{$data->detil[0]->program}}</td>
                                </tr>
                                <tr>
                                    <td class="pr-12">Kegiatan</td>
                                    <td class="px-4">:</td>
                                    <td>{{$data->detil[0]->kegiatan}}</td>
                                </tr>
                                <tr>
                                    <td class="pr-12 text-nowrap">Klasifikasi Rincian Output (KRO)</td>
                                    <td class="px-4">:</td>
                                    <td>{{$data->detil[0]->output}}</td>
                                </tr>
                                <tr>
                                    <td class="pr-12 text-nowrap align-top">Rincian Output (RO)</td>
                                    <td class="px-4 align-top">:</td>
                                    <td class="capitalize">{{$data->detil[0]->suboutput}}</td>
                                </tr>
                                <tr>
                                    <td class="pr-12">Komponen</td>
                                    <td class="px-4">:</td>
                                    <td class="capitalize">{{$data->detil[0]->komponen}}</td>
                                </tr>
                                <tr>
                                    <td class="pr-12">Sub Komponen</td>
                                    <td class="px-4">:</td>
                                    <td class="capitalize">{{$data->detil[0]->subkomponen}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="leading-normal text-justify text-lg mx-2 mb-8">
                            <table class="w-full border text-center font-medium">
                                <thead>
                                    <tr class="fs-6" style="background:#DDD9C3;">
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
                                    <tr class="font-semibold fs-6">
                                        <td class="border border-black px-2">{{$d->kode_akun}}</td>
                                        <td colspan="5" class="border border-black text-left px-2">{{$d->akun}}</td>
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
                        <!-- end::RAB -->
                    </td>
                </tr>
                @if($data->jenis == 'pengadaan')
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">SPESIFIKASI TEKNIS</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">
                        Spesifikasi teknis yang diperlukan untuk pengadaan adalah sebagai berikut:
                    </td>
                </tr>
                <tr>
                    <td class="align-top font-bold p-2"></td>
                    <td colspan="3" class="mb-4">
                        <div class="leading-tight text-lg mx-2 mb-8">
                            <table class="w-full border text-center font-medium">
                                <thead>
                                    <tr class="fs-6">
                                        <th class="border border-black p-2 font-bold">No</th>
                                        <th class="border border-black p-2 font-bold">Rincian</th>
                                        <th class="border border-black p-2 font-bold">Volume</th>
                                        <th class="border border-black p-2 font-bold">Satuan</th>
                                        <th class="border border-black p-2 font-bold">Spesifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->spesifikasi as $s)
                                    <tr class="fs-7">
                                        <td class="border border-black align-top px-2">{{$loop->index+1}}.</td>
                                        <td class="border border-black align-top text-left px-2">{{$s->rincian}}</td>
                                        <td class="border border-black px-2">{{$s->volume}}</td>
                                        <td class="border border-black px-2">{{$s->satuan}}</td>
                                        <td class="border border-black px-2">{{$s->spesifikasi}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="align-top font-bold p-2">{{$no++}}.</td>
                    <td class="align-top font-bold p-2 text-left text-wrap">PENUTUP</td>
                    <td class="align-top py-2 pl-10">:</td>
                    <td class="align-top p-2">
                        Apabila terdapat hal-hal yang bertentangan dengan ketentuan, peraturan, pedoman, dan kebijaksanaan
                        pemerintah yang berlaku, maka segala yang termaktub di dalam Kerangka Acuan Kegiatan (KAK) akan
                        diteliti kembali. Hal-hal yang belum diatur dalam KAK akan ditetapkan lebih lanjut. Demikian KAK
                        ini dibuat untuk dipergunakan semestinya.
                    </td>
                </tr>
            </table>



            <!-- begin::Pengesahan -->
            <table class="table-auto w-full text-center text-lg mt-20">
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