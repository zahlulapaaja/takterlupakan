<x-print-layout>

    @section('head-print')
    <div class="w-full d-flex flex-column text-xl mb-8">
        <img class="w-24 mx-auto my-4" src="{{ image('logos/logo-bps.png') }}">
        <div class="d-flex flex-column text-xl uppercase">
            <span>SERAH TERIMA PEKERJAAN</span>
            <span>$PENDATAAN LAPANGAN SUSENAS MARET</span>
            <span>{{ config('constants.INSTANSI') }} {{ config('constants.KABUPATEN') }}</span>
        </div>
        <hr class="w-4/5 mx-auto border border-top border-black my-2">
        <div class="text-center font-bold">
            <span class="capitilize">Nomor</span> : 0202/BAST/BPS/1107/3/2024
        </div>
    </div>
    @endsection

    <div class="leading-normal text-justify text-lg potrait-page">
        <div>
            Pada hari <span class="capitalize">{{$ref->terbilang_tgl}}</span>,
            bertempat di Kantor {{config('constants.SATKER')}},
            yang bertanda tangan di bawah ini:
        </div>

        <div class="ms-12 mt-4">
            <table>
                <tr>
                    <td>Nama</td>
                    <td class="pl-20">:</td>
                    <td>Awinana</td>
                </tr>
                <tr>
                    <td>ID Sobat</td>
                    <td class="pl-20">:</td>
                    <td>110723010002</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="pl-20">:</td>
                    <td>Petugas</td>
                </tr>
                <tr>
                    <td>Kegiatan</td>
                    <td class="pl-20">:</td>
                    <td>Pendataan Lapangan Susenas Maret</td>
                </tr>
            </table>

            <div class="my-4">Selanjutnya disebut PIHAK PERTAMA</div>

            <table>
                <tr>
                    <td>Nama</td>
                    <td class="pl-20">:</td>
                    <td>Gharisa Nur Fitri, S.Tr.Stat</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td class="pl-20">:</td>
                    <td>199711132021042001</td>
                </tr>
                <tr>
                    <td>Gol/Pangkat</td>
                    <td class="pl-20">:</td>
                    <td>Penata Muda (III/a)</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td class="pl-20">:</td>
                    <td>Statistisi Ahli Pertama</td>
                </tr>
            </table>

            <div class="my-4">Selanjutnya disebut PIHAK KEDUA</div>
        </div>

        <div class="d-flex flex-column mt-8">
            <span class="mb-2">
                Berdasarkan Surat Keputusan Kuasa Pengguna Anggaran Nomor 001/1107/PA/01/2024 tanggal 31 Januari 2024,
                bersama ini PIHAK PERTAMA telah menyerahkan pekerjaan Hasil Pendataan Lapangan Susenas Maret Tahun 2024
                kepada PIHAK KEDUA sebanyak 9 Dok, dengan ketentuan sebagai berikut :
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
                <td class="underline-offset-auto">Awinana</td>
                <td class="underline-offset-auto">Gharisa Nur Fitri, S.Tr.Stat</td>
            </tr>
            <tr>
                <td class="uppercase">110723010002</td>
                <td class="uppercase">NIP. 199711132021042001</td>
            </tr>
        </table>
    </div>

</x-print-layout>