<x-print-layout>

    @section('title')
    Bukti Dukung SPJ Translok
    @endsection

    @include('kegiatan.spj._print.bast')
    <div class="page-break"></div>
    @include('kegiatan.spj._print.pernyataan')

</x-print-layout>