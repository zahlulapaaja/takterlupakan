<x-print-layout>

    @if($jenis == 0)
    @include('kegiatan.spj._print.surat-tugas')
    <!-- include('kegiatan.spj._print.surat-tugas-sendiri') -->

    @elseif($jenis == 1)
    @include('kegiatan.spj._print.kwitansi')
    <!-- kwitansi itu tiap orang -->

    @elseif($jenis == 2)
    @include('kegiatan.spj._print.nominatif')
    <!-- khusus nominatif printnya landscape -->
    @endif

</x-print-layout>