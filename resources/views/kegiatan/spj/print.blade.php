<x-print-layout>
    @include('kegiatan.spj._print.surat-tugas')
    <div class="page-break"></div>
    @include('kegiatan.spj._print.kwitansi')
    <!-- kwitansi itu tiap orang -->
    <div class="page-break"></div>
    @include('kegiatan.spj._print.nominatif')
    <!-- khusus nominatif printnya landscape -->


    <!-- include('kegiatan.spj._print.daftar-honor') -->
    <!-- <div class="page-break"></div> -->
    <!-- include('kegiatan.spj._print.bast') -->
    <!-- <div class="page-break"></div> -->
    <!-- include('kegiatan.spj._print.pernyataan') -->
</x-print-layout>