@section('head-print')
<h5 class="text-center text-lg font-bold uppercase">KEPUTUSAN KUASA PENGGUNA ANGGARAN BADAN PUSAT STATISTIK<br>{{ config('constants.KABUPATEN') }}<br>NOMOR: <?php echo '$nomorsk'; ?></h5>
<br>
<h5><strong>TENTANG</strong></h5>
<br>
<h5><strong><?php echo 'wordwrap($judulsk, 75, "<br>\n")'; ?></strong></h5>
<br>
<h5><strong>KUASA PENGGUNA ANGGARAN BADAN PUSAT STATISTIK <?php echo 'strtoupper($kab)'; ?></strong></h5>
@endsection

<x-print-layout>
    oi
</x-print-layout>