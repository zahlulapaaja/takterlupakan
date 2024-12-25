<x-print-layout>
    @include('kegiatan.spj._print.surat-tugas')
    <!-- include('kegiatan.spj._print.surat-tugas-sendiri') -->
    <div class="page-break"></div>
    @include('kegiatan.spj._print.kwitansi')
    <!-- kwitansi itu tiap orang -->
    @include('kegiatan.spj._print.nominatif')
    <!-- khusus nominatif printnya landscape -->
</x-print-layout>