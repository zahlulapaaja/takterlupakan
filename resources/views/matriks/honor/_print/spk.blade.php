<x-print-layout>

    @section('title')
    SPK
    @endsection

    @foreach($data as $d)
    @if (!($loop->first))
    <div class="page-break"></div>
    @endif

    <!-- begin::Header -->
    <div class="flex flex-col place-items-center text-center font-bold uppercase">
        <div class="d-flex flex-column text-xl mb-8">
            <span>PERJANJIAN KERJA</span>
            <span>PETUGAS PENGAWASAN/PENCACAHAN/PENGOLAHAN KEGIATAN LAPANGAN SURVEI/SENSUS BULAN {{$ref->terbilang_bulan}} TAHUN {{$d->tahun}}</span>
            <span>PADA {{config('constants.INSTANSI')}} {{config('constants.KABUPATEN')}}</span>
            <span>NOMOR: {{$d->no_spk}}</span>
        </div>
    </div>
    <!-- end::Header -->

    <div class="leading-normal text-justify text-lg potrait-page">
        <div>
            Pada hari ini, <span class="capitalize">{{$ref->terbilang_tgl}}</span>,
            bertempat di {{config('constants.SATKER')}},
            yang bertanda tangan di bawah ini:
        </div>

        <table class="mt-8">
            <tr>
                <td class="align-top p-2">1.</td>
                <td class="align-top p-2 text-nowrap">{{$ref->ppk->nama}}</td>
                <td class="align-top py-2 pl-20">:</td>
                <td class="align-top p-2">
                    Pejabat Pembuat Komitmen {{config('constants.SATKER')}},
                    alamat {{config('constants.JALAN')}}, Desa Drien Rampak, Kec. Johan Pahlawan,
                    bertindak untuk dan atas nama {{config('constants.SATKER')}},
                    selanjutnya disebut <span class="font-bold">PIHAK PERTAMA</span>.
                </td>
            </tr>
            <tr>
                <td class="align-top p-2">2.</td>
                <td class="align-top p-2 text-nowrap">{{$d->petugas->nama}}</td>
                <td class="align-top py-2 pl-20">:</td>
                <td class="align-top p-2">
                    Mitra {{config('constants.SATKER')}}, berkedudukan di Kecamatan {{$d->petugas->kecamatan}},
                    bertindak untuk dan atas nama diri sendiri, selanjutnya disebut
                    <span class="font-bold">PIHAK KEDUA</span>.
                </td>
            </tr>
        </table>

        <div class="mt-8">
            bahwa <span class="font-bold">PIHAK PERTAMA</span> dan <span class="font-bold">PIHAK KEDUA</span>
            yang secara bersama-sama disebut <span class="font-bold">PARA PIHAK</span>, sepakat untuk
            mengikatkan diri dalam Perjanjian Kerja Petugas Pengawasan/Pencacahan/Pengolahan Kegiatan Lapangan
            Survei/Sensus Bulan {{$ref->terbilang_bulan}} Tahun {{$d->tahun}} pada {{config('constants.INSTANSI')}}
            {{config('constants.KABUPATEN')}} yang selanjutnya disebut Perjanjian, dengan ketentuan-ketentuan sebagai berikut:
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 1</span>
            <span class="mt-4">
                <span class="font-bold">PIHAK PERTAMA</span> memberikan pekerjaan kepada
                <span class="font-bold">PIHAK KEDUA</span> dan <span class="font-bold">PIHAK KEDUA</span>
                menerima pekerjaan dari <span class="font-bold">PIHAK PERTAMA</span> sebagai Petugas Kegiatan
                Lapangan Sensus/Survei Tahun {{$d->tahun}} pada {{config('constants.INSTANSI')}} {{config('constants.KABUPATEN')}},
                dengan lingkup pekerjaan yang ditetapkan oleh <span class="font-bold">PIHAK PERTAMA</span>.
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 2</span>
            <span class="mt-4">
                Ruang lingkup pekerjaan dalam Perjanjian ini mengacu pada wilayah kerja dan beban kerja
                sebagaimana tertuang dalam lampiran Perjanjian. Pedoman Pengawasan/Pencacahan Kegiatan
                Lapangan Sensus/Survei Bulan {{$ref->terbilang_bulan}} Tahun {{$d->tahun}} pada
                {{config('constants.INSTANSI')}} {{config('constants.KABUPATEN')}},
                dan ketentuan-ketentuan yang ditetapkan oleh <span class="font-bold">PIHAK PERTAMA</span>.
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 3</span>
            <span class="mt-4">
                Jangka Waktu Perjanjian terhitung sejak tanggal {{date_indo($ref->awal_bulan)}}
                sampai dengan tanggal {{date_indo($ref->akhir_bulan)}}.
            </span>
        </div>
    </div>

    <div class="leading-normal text-justify text-lg">
        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 4</span>
            <span class="mt-4">
                <span class="font-bold">PIHAK KEDUA</span> berkewajiban melaksanakan seluruh pekerjaan
                yang diberikan oleh <span class="font-bold">PIHAK PERTAMA</span> sampai selesai,
                sesuai ruang lingkup pekerjaan sebagaimana dimaksud dalam Pasal 2, dengan menerapkan
                protokol kesehatan pencegahan Covid-19 yang berlaku di wilayah kerja masing-masing.
            </span>
        </div>

        <br> <!-- biar halaman rapi -->
        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 5</span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(1)</div>
                <div>
                    <span class="font-bold">PIHAK KEDUA</span> berhak untuk mendapatkan honorarium petugas
                    dari <span class="font-bold">PIHAK PERTAMA</span> sebesar {{currency_IDR($d->honor_akumulasi)}}
                    (<span class="capitalize">{{Terbilang::make($d->honor_akumulasi)}}</span> Rupiah) untuk pekerjaan sebagaimana dimaksud dalam Pasal 2, termasuk biaya pajak,
                    bea materai, pulsa dan kuota internet untuk komunikasi, dan jasa pelayanan keuangan.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(2)</div>
                <div>
                    <span class="font-bold">PIHAK KEDUA</span> tidak diberikan honorarium tambahan apabila
                    melakukan kunjungan di luar jadwal atau terdapat tambahan waktu pelaksanaan pekerjaan lapangan.
                </div>
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 6</span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(1)</div>
                <div>
                    Pembayaran honorarium sebagaimana dimaksud dalam Pasal 5 dilakukan setelah
                    <span class="font-bold">PIHAK KEDUA</span> menyelesaikan dan menyerahkan seluruh
                    hasil pekerjaan sebagaimana dimaksud dalam Pasal 2 kepada <span class="font-bold">PIHAK PERTAMA</span>.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(2)</div>
                <div>
                    Pembayaran sebagaimana dimaksud pada ayat (1) dilakukan oleh <span class="font-bold">PIHAK PERTAMA</span>
                    kepada <span class="font-bold">PIHAK KEDUA</span> sesuai dengan ketentuan peraturan perundang-undangan.
                </div>
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 7</span>
            <span class="mt-4">
                Penyerahan hasil pekerjaan lapangan sebagaimana dimaksud dalam Pasal 2 dilakukan
                secara bertahap dan selambat-lambatnya seluruh hasil pekerjaan lapangan diserahkan
                sesuai jadwal yang tercantum dalam Lampiran, yang dinyatakan dalam Berita Acara
                Serah Terima Hasil Pekerjaan yang ditandatangani oleh <span class="font-bold">PARA PIHAK</span>.
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 8</span>
            <span class="mt-4">
                <span class="font-bold">PIHAK PERTAMA</span> dapat memutuskan Perjanjian ini secara sepihak
                sewaktu-waktu dalam hal <span class="font-bold">PIHAK KEDUA</span> tidak dapat melaksanakan
                kewajibannya sebagaimana dimaksud dalam Pasal 4, termasuk dalam kondisi terindikasi terinfeksi
                virus Covid-19, dengan menerbitkan Surat Pemutusan Perjanjian Kerja.
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 9</span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(1)</div>
                <div>
                    Apabila <span class="font-bold">PIHAK KEDUA</span> mengundurkan diri pada
                    saat/setelah pelaksanaan pekerjaan lapangan dengan tidak menyelesaikan pekerjaan
                    yang menjadi tanggung jawabnya, maka dipertimbangkan untuk tidak dapat diikutsertakan
                    pada kegiatan {{config('constants.INSTANSI')}} survei/sensus selanjutnya.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(2)</div>
                <div>
                    Dikecualikan tidak membayar ganti rugi sebagaimana dimaksud pada ayat (1) kepada
                    <span class="font-bold">PIHAK PERTAMA</span>, apabila <span class="font-bold">PIHAK KEDUA</span>
                    meninggal dunia, mengundurkan diri karena sakit dengan keterangan rawat inap, terindikasi
                    terinfeksi virus Covid-19, kecelakaan dengan keterangan kepolisian, dan/atau telah diberikan
                    Surat Pemutusan Perjanjian Kerja dari <span class="font-bold">PIHAK PERTAMA</span>.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(3)</div>
                <div>
                    Dalam hal terjadi peristiwa sebagaimana dimaksud pada ayat (2),
                    <span class="font-bold">PIHAK PERTAMA</span> membayarkan honorarium kepada
                    <span class="font-bold">PIHAK KEDUA</span> secara proporsional sesuai pekerjaan
                    yang telah dilaksanakan.
                </div>
            </span>
        </div>
    </div>

    <div class="leading-normal text-justify text-lg potrait-page">
        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 10</span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(1)</div>
                <div>
                    Apabila terjadi Keadaan Kahar, yang meliputi bencana alam, bencana non alam,
                    dan bencana sosial, <span class="font-bold">PIHAK KEDUA</span> memberitahukan kepada
                    <span class="font-bold">PIHAK PERTAMA</span> dalam waktu paling lambat 7 (tujuh) hari
                    sejak mengetahui atas kejadian Keadaan Kahar dengan menyertakan bukti.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(2)</div>
                <div>
                    Pada saat terjadi Keadaan Kahar, pelaksanaan pekerjaan oleh <span class="font-bold">PIHAK KEDUA</span>
                    dihentikan sementara dan dilanjutkan kembali setelah Keadaan Kahar berakhir,
                    namun apabila akibat Keadaan Kahar tidak memungkinkan dilanjutkan/diselesaikannya
                    pelaksanaan pekerjaan, <span class="font-bold">PIHAK KEDUA</span> berhak
                    menerima honorarium secara proporsional sesuai pekerjaan yang telah dilaksanakan.
                </div>
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 11</span>
            <span class="mt-4">
                Segala sesuatu yang belum atau tidak cukup diatur dalam Perjanjian ini, dituangkan dalam
                perjanjian tambahan/addendum dan merupakan bagian tidak terpisahkan dari perjanjian ini.
            </span>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="text-center font-bold">Pasal 12</span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(1)</div>
                <div>
                    Segala perselisihan atau perbedaan pendapat yang timbul sebagai akibat adanya
                    Perjanjian ini akan diselesaikan secara musyawarah untuk mufakat.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">(2)</div>
                <div>
                    Apabila perselisihan tidak dapat diselesaikan sebagaimana dimaksud pada ayat (1),
                    <span class="font-bold">PARA PIHAK</span> sepakat menyelesaikan perselisihan dengan
                    memilih kedudukan/domisili hukum di Panitera Pengadilan Negeri Meulaboh.
                </div>
            </span>
        </div>

        <div class="mt-8">
            Demikian Perjanjian ini dibuat dan ditandatangani oleh <span class="font-bold">PARA PIHAK</span>
            dalam 2 (dua) rangkap asli bermeterai cukup, tanpa paksaan dari <span class="font-bold">PIHAK</span>
            manapun dan untuk dilaksanakan oleh <span class="font-bold">PARA PIHAK</span>.
        </div>

        <table class="table-auto w-full text-center text-lg mt-20">
            <tr>
                <td class="font-bold pb-20">PIHAK KEDUA,</td>
                <td class="font-bold pb-20">PIHAK PERTAMA,</td>
            </tr>
            <tr>
                <td class="uppercase">{{$d->petugas->nama}}</td>
                <td class="uppercase">{{$ref->ppk->nama}}</td>
            </tr>
        </table>
    </div>

    <!-- begin::Header -->
    <div class="landscape-page">

        <div class="flex flex-col place-items-center text-center font-bold uppercase">
            <div class="w-full flex flex-row-reverse font-normal mb-8">
                <div class="w-1/2 text-justify mr-12">
                    <span>Lampiran</span><br>
                    <span class="uppercase">
                        PERJANJIAN KERJA PETUGAS PENGAWASAN/ PENCACAHAN/PENGOLAHAN KEGIATAN
                        LAPANGAN SENSUS/SURVEI BULAN {{$ref->terbilang_bulan}} TAHUN {{$d->tahun}}
                        PADA {{config('constants.INSTANSI')}} {{config('constants.KABUPATEN')}}
                    </span><br>
                    <span>NOMOR: {{$d->no_spk}}</span>
                </div>
            </div>
            <div class="w-full text-center text-xl uppercase font-bold">
                DAFTAR URAIAN TUGAS, JANGKA WAKTU, NILAI PERJANJIAN DAN BEBAN ANGGARAN
            </div>
        </div>
        <!-- end::Header -->

        <div class="leading-loose text-justify text-lg mt-4">
            <div class="mx-12">
                <table class="w-full border text-center font-medium">
                    <thead>
                        <tr>
                            <th rowspan="2" class="border border-black p-2 font-bold">No</th>
                            <th rowspan="2" class="border border-black p-2 font-bold">Uraian Tugas</th>
                            <th rowspan="2" class="border border-black p-2 font-bold">Jangka Waktu</th>
                            <th colspan="2" class="border border-black p-2 font-bold">Target Pekerjaan</th>
                            <th rowspan="2" class="border border-black p-2 font-bold">Harga Satuan</th>
                            <th rowspan="2" class="border border-black p-2 font-bold">Nilai Perjanjian</th>
                            <th rowspan="2" class="border border-black p-2 font-bold">Beban Anggaran</th>
                        </tr>
                        <tr>
                            <th class="border border-black p-2 font-bold">Volume</th>
                            <th class="border border-black p-2 font-bold">Satuan</th>
                        </tr>
                        <tr class="text-sm font-thin">
                            <td class="border border-black">(1)</td>
                            <td class="border border-black">(2)</td>
                            <td class="border border-black">(3)</td>
                            <td class="border border-black">(4)</td>
                            <td class="border border-black">(5)</td>
                            <td class="border border-black">(6)</td>
                            <td class="border border-black">(7)</td>
                            <td class="border border-black">(8)</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($d->honor as $h)
                        <tr class="text-sm font-thin">
                            <td class="border border-black">{{$loop->index+1}}.</td>
                            <td class="border border-black capitalize">{{$h->sebagai}} {{$h->keg->nama}}</td>
                            <td class="border border-black">{{date_indo($h->keg->tgl_awal)}} s.d. {{date_indo($h->keg->tgl_akhir)}}</td>
                            <td class="border border-black">{{$h->volume}}</td>
                            <td class="border border-black">{{$h->satuan}}</td>
                            <td class="border border-black">{{currency_IDR($h->harga)}}</td>
                            <td class="border border-black">{{currency_IDR($h->volume*$h->harga)}}</td>
                            <td class="border border-black">{{$h->mak}}</td>
                        </tr>
                        @endforeach
                        <tr class="text-sm font-thin">
                            <td colspan="6" class="border border-black font-bold capitalize">Terbilang: {{Terbilang::make($d->honor_akumulasi)}} Rupiah</td>
                            <td class="border border-black font-bold">{{currency_IDR($d->honor_akumulasi)}}</td>
                            <td class="border border-black"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @endforeach

</x-print-layout>