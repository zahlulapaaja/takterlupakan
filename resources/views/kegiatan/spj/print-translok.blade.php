<x-print-layout>

    @if($jenis == 0)

    @if(count($data->petugas) == 1)
    <!-- surat tugas tanpa lampiran  -->
    @include('kegiatan.spj._print.surat-tugas-sendiri')
    @else
    <!-- surat tugas dengan lampiran  -->
    @include('kegiatan.spj._print.surat-tugas')
    @endif

    @elseif($jenis == 1)
    <!-- kwitansi untuk tiap orang -->
    @include('kegiatan.spj._print.kwitansi')

    @elseif($jenis == 2)
    <!-- daftar pengeluaran riil untuk tiap orang -->
    @include('kegiatan.spj._print.pengeluaran-riil')

    @elseif($jenis == 3)
    <!-- khusus nominatif printnya landscape -->
    @include('kegiatan.spj._print.nominatif')
    @endif

</x-print-layout>