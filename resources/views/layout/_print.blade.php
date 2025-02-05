@extends('layout.master')
@push('css')

<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0mm;
        padding: 12mm 16mm;
    }

    /* @font-face {
        font-family: Arial;
        src: url("{{asset('assets/fonts/arial/ARIAL.TTF')}}");
    } */
    /* @font-face {
        font-family: Arial;
        src: url("{{asset('assets/fonts/ArialMT.ttf')}}") format('woff2');
    } */
    /* Bisa tapi gatau kenapa lambat banget ngeload fontnya */

    body {
        color: black !important;
        /* font-family: Arial; */
    }

    .page-break {
        display: block;
        page-break-before: always;
    }

    @page orientation-portrait {
        size: portrait;
        width: 21cm;
        height: 29.7cm;
    }

    @page orientation-landscape {
        size: landscape;
        width: 29.7cm;
        height: 21cm;
    }

    .landscape-page {
        page: orientation-landscape;
        width: 29.7cm;
        height: 21cm;
    }

    .portrait-page {
        page: orientation-portrait;
        width: 21cm;
        height: 29.7cm;
    }
</style>
@endpush
@section('content')
<div class="flex flex-col place-items-center text-center font-bold uppercase">
    @yield('head-print')
</div>
<div class="potrait-page">
    {{ $slot }}
</div>


@push('scripts')
<script type="text/javascript">
    // var is_chrome = function() {
    //     return Boolean(window.chrome);
    // }
    // window.onload = function() {
    //     if (is_chrome()) {
    //         window.print();
    //         setTimeout(function() {
    //             window.close();
    //         }, 10000);
    //         //give them 10 seconds to print, then close
    //     } else {
    //         window.print();
    //         window.close();
    //     }
    // }
    window.onload = function() {
        window.print();
    }
    // window.addEventListener("load", window.print());
</script>
@endpush
@endsection