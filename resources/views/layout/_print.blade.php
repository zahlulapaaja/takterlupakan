@extends('layout.master')
@push('css')
<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
        padding: 12mm 16mm;

    }

    body {
        width: 21cm;
        height: 29.7cm;
        color: black !important;
    }

    .page-break {
        display: block;
        page-break-before: always;
    }
</style>
@endpush
@section('content')
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @yield('head-print')
</div>
<div>
    {{ $slot }}
</div>


@push('scripts')
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
@endpush
@endsection