<x-print-layout>

    @section('head-print')
    <div class="w-full d-flex flex-column text-xl mb-8">
        <img class="w-24 mx-auto my-4" src="{{ image('logos/logo-bps.png') }}">
        <div class="d-flex flex-column text-xl uppercase">
            <span>SERAH TERIMA PEKERJAAN</span>
            <span>{{$data->keg->nama}}</span>
            <span>{{config('constants.INSTANSI') }} {{ config('constants.KABUPATEN')}}</span>
        </div>
        <hr class="w-4/5 mx-auto border border-top border-black my-2">
        <div class="text-center font-bold">
            <span class="capitilize">Nomor</span> : {{$data->no_bast}}
        </div>
    </div>
    @endsection

    <div class="leading-normal text-justify text-lg potrait-page">
        <div>
            Pada hari <span class="capitalize">{{$data->terbilang_tgl}}</span>,
            bertempat di Kantor {{config('constants.SATKER')}},
            yang bertanda tangan di bawah ini:
        </div>

        <div class="ms-12 mt-4">
            <table>
                <tr>
                    <td>Nama</td>
                    <td class="pl-28">:</td>
                    <td>{{$data->nama}}</td>
                </tr>
                <tr>
                    <td>ID Sobat</td>
                    <td class="pl-28">:</td>
                    <td>{{$data->nip}}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="pl-28">:</td>
                    <td>{{$data->sebagai}}</td>
                </tr>
                <tr>
                    <td>Kegiatan</td>
                    <td class="pl-28">:</td>
                    <td>{{$data->keg->nama}}</td>
                </tr>
            </table>

            <div class="my-4">Selanjutnya disebut PIHAK PERTAMA</div>

            <table>
                <tr>
                    <td>Nama</td>
                    <td class="pl-20">:</td>
                    <td>{{$data->keg->pjk->nama}}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="pl-20">:</td>
                    <td>{{$data->keg->pjk->nip_baru}}</td>
                </tr>
                <tr>
                    <td>Gol/Pangkat</td>
                    <td class="pl-20">:</td>
                    <td>{{$data->keg->pjk->pangkat}} ({{$data->keg->pjk->golongan}})</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="pl-20">:</td>
                    <td>{{$data->keg->pjk->jabatan}}</td>
                </tr>
            </table>

            <div class="my-4">Selanjutnya disebut PIHAK KEDUA</div>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="mb-2">
                Berdasarkan Surat Keputusan Kuasa Pengguna Anggaran Nomor {{$ref->no_sk_kpa}} tanggal {{date_indo($ref->tgl_sk_kpa)}}
                bersama ini PIHAK PERTAMA telah menyerahkan pekerjaan Hasil {{$data->keg->nama}} Tahun {{$data->keg->tahun}}
                kepada PIHAK KEDUA sebanyak {{$data->volume}} {{$data->satuan}}, dengan ketentuan sebagai berikut :
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">1.</div>
                <div>
                    Hasil pekerjaan PIHAK PERTAMA telah sesuai dengan jumlah dan spesifikasi teknis/kualitas yang ditetapkan dalam SK.
                </div>
            </span>
            <span class="d-flex flex-row mt-4">
                <div class="pr-4">2.</div>
                <div>
                    Hasil pekerjaan sebagaimana tersebut pada butir 1 telah diperiksa oleh Pemeriksa dan diterima kelengkapannya oleh PIHAK KEDUA.
                </div>
            </span>
            <span class="mt-2">
                Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.
            </span>
        </div>

        <table class="table-auto w-full text-center text-lg mt-8">
            <tr>
                <td class="font-bold pb-20">PIHAK PERTAMA,</td>
                <td class="font-bold pb-20">PIHAK KEDUA,</td>
            </tr>
            <tr>
                <td class="underline-offset-auto">{{$data->nama}}</td>
                <td class="underline-offset-auto">{{$data->keg->pjk->nama}}</td>
            </tr>
            <tr>
                <td class="uppercase">{{$data->nip}}</td>
                <td class="uppercase">NIP. {{$data->keg->pjk->nip_baru}}</td>
            </tr>
        </table>
    </div>

</x-print-layout>