<x-print-layout>

    <div class="potrait-page">
        <!-- begin::Header -->
        <div class="flex flex-col place-items-center text-center font-bold uppercase">
            <div class="d-flex flex-column mb-8">
                <div class="d-flex flex-column my-20">
                    <span class="fs-1 mb-20">KERANGKA ACUAN KERJA</span>
                    <div class="d-flex flex-column fs-2 mt-20">
                        <span>PERJALANAN DINAS DALAM RANGKA</span>
                        <span>WORKSHOP EVALUASI DATA STATISTIK NASIONAL</span>
                        <span>{{ config('constants.SATKER') }} TAHUN 2024</span>
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
                        <td class="capitalize">Program Penyediaan dan Pelayanan Informasi Statistik</td>
                    </tr>
                    <tr>
                        <td class="align-top pr-12">Kegiatan</td>
                        <td class="align-top px-4">:</td>
                        <td class="capitalize">Penyediaan dan Pengembangan Statistik Kesejahteraan Rakyat</td>
                    </tr>
                    <tr>
                        <td class="text-nowrap pr-12">Penanggung Jawab</td>
                        <td class="px-4">:</td>
                        <td>Tim Statistik Sosial</td>
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

    <div class="page-break"></div>

    <div class="potrait-page leading-normal text-xl">
        <!-- begin::Dasar Hukum -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> A. Dasar Hukum </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <table class="text-left ms-8">
                <tr>
                    <td class="pr-4 align-top">1.</td>
                    <td>Undang-Undang Nomor 16 Tahun 1997 tentang Statistik.</td>
                </tr>
                <tr>
                    <td class="pr-4 align-top">2.</td>
                    <td>Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara.</td>
                </tr>
                <tr>
                    <td class="pr-4 align-top">3.</td>
                    <td>Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik.</td>
                </tr>
                <tr>
                    <td class="pr-4 align-top">4.</td>
                    <td>Peraturan Presiden Nomor 90 Tahun 2010 tentang Penyusunan RKA-KL.</td>
                </tr>
                <tr>
                    <td class="pr-4 align-top">5.</td>
                    <td>Peraturan Menteri Keuangan RI Nomor 51/PMK.02/2014 Perubahan atas Peraturan
                        Menteri Keuangan Nomor Nomor 71/PMK.02/2013 tentang Pedoman Standar Biaya,
                        Standar Struktur Biaya dan Indeksasi dalam Penyusunan Rencana Kerja dan Anggaran
                        Kementerian Negara/Lembaga.
                    </td>
                </tr>
                <tr>
                    <td class="pr-4 align-top">6.</td>
                    <td>Peraturan Menteri Keuangan RI Nomor 208/PMK.02/2019 tentng Petunjuk Penyusunan
                        dan Penelaahan Rencana Kerja dan Anggaran Kementerian Negara/Lembaga dan Pengesahan
                        Daftar Isian Pelaksanaan Anggaran.
                    </td>
                </tr>
                <tr>
                    <td class="pr-4 align-top">7.</td>
                    <td>Peraturan Menteri Keuangan RI Nomor 49 Tahun 2023 tentang Standar Biaya Masukan Tahun Anggaran 2024.</td>
                </tr>
            </table>
            <!-- end::Konten -->
        </div>
        <!-- end::Dasar Hukum -->

        <!-- begin::Latar Belakang -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> B. Latar Belakang </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8">
                <span class="indent-16">
                    Salah satu arahan presiden dalam Peraturan Presiden Nomor 18 Tahun 2020 tentang
                    Rencana Pembangunan Jangka Menengah Nasional (RPJMN) Tahun 2020-2024 adalah
                    pembangunan sumber daya manusia (SDM) dan infrastruktur. Pembangunan SDM unggul
                    disertai dengan infrastruktur perlu direncanakan dan dilaksanakan secara tepat
                    supaya pembangunan dapat berjalan lancar dan memberikan manfaat yang dapat dinikmati
                    oleh seluruh bangsa Indonesia.
                </span>
                <span class="indent-16">
                    BPS sebagai penyedia statistik yang berkualitas, memiliki tantangan untuk menghasilkan
                    data indikator statistik sosial yang akurat. Workshop Evaluasi Data Statistik Sosial
                    menjadi penting sebagai media untuk melakukan evaluasi terhadap data yang dihasilkan
                    dari kegiatan statistik sosial khususnya indikator ketenagakerjaan Agustus 2024.
                    Diperlukan koordinasi dan pemecahan masalah-masalah teknis yang dijumpai pada saat
                    pelaksanaan kegiatan statistik sosial dan evaluasi hasil secara intens dan terfokus
                    antara tim BPS Provinsi dan tim BPS Kabupaten/Kota untuk perbaikan pelaksanaan kegiatan
                    selanjutnya.
                </span>
                <span class="indent-16">
                    Di samping itu, dalam kegiatan ini akan dilakukan sharing knowledge terkait
                    penghitungan angka kemiskinan dan indikator statistik sosial lainnya.
                </span>
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Latar Belakang -->

        <!-- begin::Maksud dan Tujuan -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> C. Maksud dan Tujuan </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8">
                <span class="indent-16">
                    Tujuan diselenggarakannya Workshop Evaluasi Data Statistik Sosial adalah untuk
                    melakukan evaluasi terhadap data yang dihasilkan dari kegiatan statistik sosial
                    dan memberikan penjelasan dan pemahaman yang sama tentang penghitungan angka
                    kemiskinan dan indikator-indikator yang dihasilkan dari kegiatan statistik sosial.
                </span>
                <span class="indent-16">
                    Sasaran yang ingin dicapai dari Workshop Evaluasi Data Statistik Sosial adalah:
                </span>
                <ul class="list-disc pl-16">
                    <li>
                        Perkiraan indikator ketenagakerjaan dari Sakernas Agustus 2024 dan fenomena pendukung indikator tersebut.
                    </li>
                    <li>
                        Peserta memahami tentang penghitungan angka kemiskinan dan indikator-indikator yang dihasilkan dari kegiatan statistik sosial.
                    </li>
                    <li>
                        Meningkatnya koordinasi dan komunikasi antara tim statistik sosial provinsi dan kabupaten/kota terkait dengan kegiatan statistik sosial.
                    </li>
                </ul>
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Maksud dan Tujuan -->

        <!-- begin::Manfaat -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> D. Manfaat </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8">
                <ul class="list-disc pl-16">
                    <li>
                        Perkiraan Indikator Ketenagakerjaan Agustus 2024.
                    </li>
                    <li>
                        Peserta Workshop Evaluasi Data Statistik Sosial memahami tentang penghitungan angka kemiskinan dan indikator-indikator yang dihasilkan dari kegiatan statistik sosial.
                    </li>
                    <li>
                        Koordinasi dan komunikasi yang baik antara tim statistik sosial provinsi dan kabupaten/kota dalam pelaksanaan kegiatan statistik sosial.
                    </li>
                </ul>
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Manfaat -->

        <!-- begin::Metode Pengadaan Barang/Jasa dan Ruang Lingkup -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> E. Metode Pengadaan Barang/Jasa dan Ruang Lingkup </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8">
                -
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Metode Pengadaan Barang/Jasa dan Ruang Lingkup -->

        <!-- begin::Waktu dan Tempat Pelaksanaan -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> F. Waktu dan Tempat Pelaksanaan </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <table class="text-left ms-8">
                <tr>
                    <td class="pr-16 align-top">Tanggal</td>
                    <td>: 30 September - 3 Oktober 2024</td>
                </tr>
                <tr>
                    <td class="pr-16 align-top">Tempat</td>
                    <td>: Kota Sabang</td>
                </tr>
            </table>
            <!-- end::Konten -->
        </div>
        <!-- end::Waktu dan Tempat Pelaksanaan -->

        <!-- begin::Biaya -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> G. Biaya </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8">
                <span>
                    Pembiayaan akan dibebankan dalam DIPA Satuan Kerja BPS Propinsi Aceh Nomor:
                    SP DIPA-054.01.2.019738/2024 yang meliputi :
                </span>
                <span>
                    1. Biaya Perjalanan Dinas Biasa
                </span>
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Biaya -->

        <!-- begin::Peserta -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> H. Peserta </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8 me-1">
                <span>
                    Pegawai yang melaksanakan kegiatan :
                </span>
                <table class="w-full border text-center font-medium">
                    <tr>
                        <th class="border border-black py-2 font-bold">No.</th>
                        <th class="border border-black py-2 font-bold">Nama</th>
                        <th class="border border-black py-2 font-bold">NIP</th>
                        <th class="border border-black py-2 font-bold">Tanggal</th>
                        <th class="border border-black py-2 font-bold">Asal</th>
                        <th class="border border-black py-2 font-bold">Tujuan</th>
                    </tr>
                    <tr class="text-lg">
                        <td class="border border-black p-1">1.</td>
                        <td class="border border-black p-1">Muhammad Apriesya Wastu Nirbhaya</td>
                        <td class="border border-black p-1">199904022023101001</td>
                        <td class="border border-black p-1">30 September - 3 Oktober 2024</td>
                        <td class="border border-black p-1">Aceh Barat</td>
                        <td class="border border-black p-1">Kota Sabang</td>
                    </tr>
                </table>
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Peserta -->

        <!-- begin::Rencana Anggaran Biaya (RAB) -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> I. Rencana Anggaran Biaya (RAB) </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <table class="leading-tight text-left">
                <tr>
                    <td class="align-top px-12">Program</td>
                    <td class="align-top px-4">:</td>
                    <td>{{$data->pok->program}}</td>
                </tr>
                <tr>
                    <td class="align-top px-12">Kegiatan</td>
                    <td class="align-top px-4">:</td>
                    <td>{{$data->pok->kegiatan}}</td>
                </tr>
                <tr>
                    <td class="align-top px-12 text-nowrap">Klasifikasi Rincian Output (KRO)</td>
                    <td class="align-top px-4">:</td>
                    <td>{{$data->pok->output}}</td>
                </tr>
                <tr>
                    <td class="align-top px-12 text-nowrap">Rincian Output (RO)</td>
                    <td class="align-top px-4">:</td>
                    <td class="capitalize">{{$data->pok->suboutput}}</td>
                </tr>
                <tr>
                    <td class="align-top px-12">Komponen</td>
                    <td class="align-top px-4">:</td>
                    <td class="capitalize">{{$data->pok->komponen}}</td>
                </tr>
                <tr>
                    <td class="align-top px-12">Sub Komponen</td>
                    <td class="align-top px-4">:</td>
                    <td class="capitalize">{{$data->pok->subkomponen}}</td>
                </tr>
            </table>
            <div class="mx-4">
                <table class="w-full border text-center font-medium">
                    <thead>
                        <tr style="background:#DDD9C3;">
                            <th class="border border-black p-2 font-bold text-nowrap">Akun</th>
                            <th class="border border-black p-2 font-bold text-nowrap">Rincian</th>
                            <th class="border border-black p-2 font-bold text-nowrap">Vol</th>
                            <th class="border border-black p-2 font-bold text-nowrap">Satuan</th>
                            <th class="border border-black p-2 font-bold text-nowrap">Harga Satuan</th>
                            <th class="border border-black p-2 font-bold text-nowrap">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-black align-top font-bold p-2">524111</td>
                            <td class="border border-black text-left p-2">
                                <div class="flex flex-column">
                                    <span class="font-bold">Belanja Perjalanan Dinas Biasa</span>
                                    <span class="text-normal">Pengawasan pemutakhiran MFD dan MBS (kabupaten/kota ke kecamatan)</span>
                                </div>
                            </td>
                            <td class="border border-black p-2">3</td>
                            <td class="border border-black p-2">O-K</td>
                            <td class="border border-black p-2">80.000</td>
                            <td class="border border-black p-2">240.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Rencana Anggaran Biaya (RAB) -->

        <!-- begin::Spesifikasi Teknis yang Diperlukan untuk Pengadaan -->
        <div class="mb-8">
            <!-- begin::Header -->
            <div class="mb-2 fs-2 font-bold"> I. Spesifikasi Teknis yang Diperlukan untuk Pengadaan </div>
            <!-- end::Header -->
            <!-- begin::Konten -->
            <div class="flex flex-column gap-3 text-justify ms-8">
                -
            </div>
            <!-- end::Konten -->
        </div>
        <!-- end::Spesifikasi Teknis yang Diperlukan untuk Pengadaan -->

        <!-- begin::TTD -->
        <table class="table-auto w-full text-center text-lg mt-8">
            <tr>
                <td></td>
                <td>{{config('constants.MEULABOH')}}, {{$data->tgl_spj}}</td>
            </tr>
            <tr>
                <td>Mengetahui,</td>
                <td>Menyetujui,</td>
            </tr>
            <tr>
                <td class="pb-20">Kepala {{config('constants.SATKER')}}</td>
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
        <!-- end::TTD -->
    </div>

</x-print-layout>