@extends('layout.master')
@section('content')
<div class="flex flex-col place-items-center">
    <img class="w-24" src="{{ image('logos/logo-bps.png') }}">
    <h2 class="text-2xl font-bold uppercase italic">{{ config('constants.INSTANSI') }}<br>{{ config('constants.KABUPATEN') }}</h2>

    <br>
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