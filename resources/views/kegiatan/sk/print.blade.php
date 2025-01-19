<x-print-layout>

    @section('title')
    SK
    @endsection

    @section('head-print')
    @include('layout.partials.print-layout._kop')
    <div class="d-flex flex-column text-xl mb-8">
        <span>KEPUTUSAN KUASA PENGGUNA ANGGARAN BADAN PUSAT STATISTIK</span>
        <span>{{ config('constants.KABUPATEN') }}</span>
        <span>NOMOR: {{$data->no_sk}}</span>
    </div>
    <div class="text-xl mb-8">TENTANG</div>
    <div class="text-xl mb-8">{{ $data->tentang . ' ' . config('constants.SATKER') }}</div>
    <div class="text-xl mb-8">KUASA PENGGUNA ANGGARAN BADAN PUSAT STATISTIK {{ config('constants.KABUPATEN') }}</div>
    @endsection

    <div class="leading-normal text-justify text-lg">
        <table class="mx-12 mt-4">
            <tr>
                <td class="align-top font-bold" width="10%">MENIMBANG</td>
                <td class="align-top" width="1%">:</td>
                <td class="align-top" width="3%"></td>
                <td class="align-top" width="86%">
                    Bahwa untuk kelancaran pelaksanaan kegiatan, perlu menetapkan
                    <span class="capitalize">{{ $data->tentang . ' ' . config('constants.SATKER') }}</span>
                    Keputusan Kuasa Pengguna Anggaran <br>
                </td>
            </tr>
        </table>

        <table class="mx-12 mt-8">
            <tr>
                <td class="align-top"><b>MENGINGAT</b></td>
                <td class="align-top">:</td>
                <td class="align-top">1.</td>
                <td class="align-top">Undang-undang Nomor 16 Tahun 1997 tentang Statistik (Lembaran Negara Nomor 39 Tahun 1997, Tambahan Lembaran Negara Republik Indonesia Nomor 3683);</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">2.</td>
                <td class="align-top">Undang-undang Nomor 17 Tahun 2003 tentang Keuangan Negara (Lembaran Negara RI Tahun 2003 Nomor 47, Tambahan Lembaran Negara RI Nomor 4287);</td>
            </tr>

            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">3.</td>
                <td class="align-top">Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara (Lembaran Negara Tahun 2004 Nomor 5, Tambahan Lembaran Negara Nomor 4355);</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">4.</td>
                <td class="align-top">Undang-Undang Nomor 9 Tahun 2020 tentang Anggaran dan Pendapatan Belanja Negara Tahun Anggaran 2021 (Lembar Negara Republik Indonesia Tahun 2020 Nomor 239);</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">5.</td>
                <td class="align-top">Peraturan Pemerintah Nomor 51 Tahun 1999 tentang Penyelenggaraan Statistik (Lembaran Negara Tahun 1999 Nomor 96, Tambahan Lembaran Negara Republik Indonesia Nomor 3854);</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">6.</td>
                <td class="align-top">Peraturan Pemerintah Nomor 50 Tahun 2018 tentang Tata Cara Pelaksanaan Anggaran Pendapatan dan Belanja Negara (Lembaran Negara Tahun 2018 Nomor 229);</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">7.</td>
                <td class="align-top">Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik (Lembaran Negara Republik Indonesia Tahun 2017 Nomor 139);</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">8.</td>
                <td class="align-top">Keputusan Kepala Badan Pusat Statistik Nomor 121 Tahun 2001 tentang Organisasi dan Tata Kerja Perwakilan BPS di Daerah;</td>
            </tr>
            <tr>
                <td class="align-top"></td>
                <td class="align-top"></td>
                <td class="align-top">9.</td>
                <td class="align-top">
                    Keputusan Kepala Badan Pusat Statistik Nomor {{ $ref->no_sk_kpa }}
                    Tanggal {{ date_indo($ref->tgl_sk_kpa) }} tentang Kuasa Pengguna Anggaran Badan Pusat Statistik
                    Tahun {{ $ref->tahun }} di Wilayah Provinsi Aceh.
                </td>
            </tr>
        </table>

        <table class="mx-12 mt-8">
            <tr>
                <td class="align-top" width="10%"><b>MEMPERHATIKAN</b></td>
                <td class="align-top" width="1%">:</td>
                <td class="align-top" width="3%"></td>
                <td class="align-top" width="86%">
                    Pengesahan DIPA Tahun Anggaran {{ $ref->tahun }}
                    Nomor {{ $ref->no_dipa }} tanggal {{ date_indo($ref->tgl_dipa) }}
                    {{ config('constants.INSTANSI') }} {{ config('constants.KABUPATEN') }}
                </td>
            </tr>
        </table>

        <div class="text-center font-bold text-xl my-8">
            <div>MEMUTUSKAN</div>
        </div>

        <table class="mx-12 mt-8">
            <tr>
                <td class="align-top font-bold">MENETAPKAN</td>
                <td class="align-top"></td>
                <td class="align-top">:</td>
                <td class="align-top uppercase">
                    KEPUTUSAN KUASA PENGGUNA ANGGARAN {{ config('constants.INSTANSI') }}
                    {{ config('constants.KABUPATEN') }} TENTANG {{ $data->tentang }}
                    {{ config('constants.SATKER') }}.
                </td>
            </tr>
            <tr>
                <td class="align-top font-bold">PERTAMA</td>
                <td class="align-top"></td>
                <td class="align-top">:</td>
                <td class="align-top">
                    Menetapkan <span class="capitalize">{{ $data->tentang }}</span>
                    {{ config('constants.SATKER') }} sebagaimana tersebut dalam Lampiran Keputusan ini,
                </td>
            </tr>
            <tr>
                <td class="align-top font-bold">KEDUA</td>
                <td class="align-top"></td>
                <td class="align-top">:</td>
                <td class="align-top">
                    <span class="capitalize">{{ $data->tentang }}</span> {{ config('constants.SATKER') }}
                    sebagaimana tersebut pada diktum PERTAMA mempunyai tanggungjawab penuh dalam pelaksanaan
                    <span class="capitalize">{{ $data->tentang }}</span> sesuai dengan jadwal yang telah ditetapkan,
                </td>
            </tr>
            <tr>
                <td class="align-top font-bold">KETIGA</td>
                <td class="align-top"></td>
                <td class="align-top">:</td>
                <td class="align-top">
                    Kepada Petugas {{ $data->tentang }} diberikan honor sesuai dengan beban kerja masing-masing;
                    @include('kegiatan.sk._table-honor')
                </td>
            </tr>
            <tr>
                <td class="align-top font-bold">KEEMPAT</td>
                <td class="align-top"></td>
                <td class="align-top">:</td>
                <td class="align-top">
                    Pembiayaan untuk pelaksanaan Keputusan ini dibebankan pada DIPA Tahun Anggaran
                    {{ $ref->tahun }} Nomor {{ $ref->no_dipa }}
                    tanggal {{ date_indo($ref->tgl_dipa) }} {{ config('constants.INSTANSI') }}
                    {{ config('constants.KABUPATEN') }}
                </td>
            </tr>

            <tr>
                <td class="align-top font-bold">KELIMA</td>
                <td class="align-top"></td>
                <td class="align-top">:</td>
                <td class="align-top">
                    Keputusan ini mulai berlaku tanggal {{ date_indo($data->tgl_berlaku) }}, dengan ketentuan apabila
                    dikemudian hari terdapat kekeliruan akan diadakan perbaikan sebagaimana mestinya.
                </td>
            </tr>
        </table>

        <div class="flex flex-row text-center ml-12 mt-20">
            <div class="w-2/5"></div>
            <div class="w-3/5 flex flex-col leading-normal">
                <span>Ditetapkan di : {{ config('constants.MEULABOH') }}</span>
                <span>Pada tanggal : {{ date_indo($data->tgl_ditetapkan) }} </span>
                <span class="uppercase">KUASA PENGGUNA ANGGARAN {{ config('constants.INSTANSI') }}</span>
                <span class="uppercase mb-20">{{ config('constants.KABUPATEN') }},</span>
                <span class="font-bold">{{ $ref->kpa->nama }}</span>
                <span>NIP. {{ $ref->kpa->nip_baru }}</span>
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="flex flex-col text-left">
        <span>
            Lampiran Keputusan Kuasa Pengguna Anggaran
            {{ config('constants.INSTANSI') . ' ' . config('constants.KABUPATEN') }}
        </span>
        <div class="flex flex-row">
            <span class="w-20">Nomor</span>
            <span>: {{ $data->no_sk }}</span>
        </div>
        <div class="flex flex-row">
            <span class="w-20">Tanggal</span>
            <span>: {{ date_indo($data->tgl_ditetapkan) }}</span>
        </div>
    </div>

    <div class="text-center font-bold uppercase mt-20">
        <div class="text-xl mb-8">DAFTAR PETUGAS {{ $data->tentang }}</div>
    </div>

    <div class="mx-12">
        <table class="w-full border text-center font-medium">
            <thead>
                <tr>
                    <th class="border border-black py-2 font-bold">No.</th>
                    <th class="border border-black py-2 font-bold">Nama Petugas</th>
                    <th class="border border-black py-2 font-bold">Gol</th>
                    <th class="border border-black py-2 font-bold">Sebagai</th>
                    <th class="border border-black py-2 font-bold">Keterangan</th>
                </tr>
                <tr class="text-sm font-thin">
                    <td class="border border-black">(1)</td>
                    <td class="border border-black">(2)</td>
                    <td class="border border-black">(3)</td>
                    <td class="border border-black">(4)</td>
                    <td class="border border-black">(5)</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data->petugas as $key => $p)
                <tr>
                    <td class="border border-black">{{ $key+1 }}.</td>
                    <td class="border border-black text-left pl-2">{{ $p->nama }}</td>
                    <td class="border border-black">{{ $p->gol }}</td>
                    <td class="border border-black">{{ $p->sebagai }}</td>
                    <td class="border border-black">-</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex flex-row text-center ml-12 mt-20">
        <div class="w-2/5"></div>
        <div class="w-3/5 flex flex-col leading-normal">
            <span>Ditetapkan di : {{ config('constants.MEULABOH') }}</span>
            <span>Pada tanggal : {{ date_indo($data->tgl_ditetapkan) }} </span>
            <span class="uppercase">KUASA PENGGUNA ANGGARAN {{ config('constants.INSTANSI') }}</span>
            <span class="uppercase mb-20">{{ config('constants.KABUPATEN') }},</span>
            <span class="font-bold">{{ $ref->kpa->nama }}</span>
            <span>NIP. {{ $ref->kpa->nip_baru }}</span>
        </div>
    </div>
</x-print-layout>