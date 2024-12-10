<?php $j = $k = $l = $m = $n = $o = $p = 0; ?>
<?php $q = 1; ?>
@for ($i = 0; $i < count($poks); $i++)
    <?php
    if ($i > 0) {
        $sama['program'] = $poks[$i]->kode_program == $poks[$i - 1]->kode_program;
        $sama['kegiatan'] = $poks[$i]->kode_kegiatan == $poks[$i - 1]->kode_kegiatan;
        $sama['output'] = $poks[$i]->kode_output == $poks[$i - 1]->kode_output;
        $sama['suboutput'] = $poks[$i]->kode_suboutput == $poks[$i - 1]->kode_suboutput;
        $sama['komponen'] = $poks[$i]->kode_komponen == $poks[$i - 1]->kode_komponen;
        $sama['subkomponen'] = $poks[$i]->kode_subkoponen == $poks[$i - 1]->kode_subkoponen;
        $sama['akun'] = $poks[$i]->kode_akun == $poks[$i - 1]->kode_akun;
    } else {
        // jadi baris nol akan dianggap true semua nanti
        $sama['program'] = false;
        $sama['kegiatan'] = false;
        $sama['output'] = false;
        $sama['suboutput'] = false;
        $sama['komponen'] = false;
        $sama['subkomponen'] = false;
        $sama['akun'] = false;
    }
    ?>
    <!-- begin::Program -->
    @if( !$sama['program'] )
    <tr class="bg-red-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-0 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['program'][$j] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['program'][$j] }}</span>
        </td>
    </tr>
    <?php $j++; ?>
    @endif
    <!-- begin::Kegiatan -->
    @if( !($sama['program'] && $sama['kegiatan']) )
    <tr class="bg-orange-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-2 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['kegiatan'][$k] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['kegiatan'][$k] }}</span>
        </td>
    </tr>
    <?php $k++; ?>
    @endif
    <!-- begin::Output -->
    @if( !($sama['program'] && $sama['kegiatan'] && $sama['output']) )
    <tr class="bg-amber-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-4 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['output'][$l] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['output'][$l] }}</span>
        </td>
    </tr>
    <?php $l++; ?>
    @endif
    <!-- begin::Sub Output -->
    @if( !($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput']) )
    <tr class="bg-yellow-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-6 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['suboutput'][$m] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['suboutput'][$m] }}</span>
        </td>
    </tr>
    <?php $m++; ?>
    @endif
    <!-- begin::Komponen -->
    @if( !($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput'] && $sama['komponen']) )
    <tr class="bg-lime-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-8 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['komponen'][$n] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['komponen'][$n] }}</span>
        </td>
    </tr>
    <?php $n++; ?>
    @endif
    <!-- begin::Sub Komponen -->
    @if( !($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput'] && $sama['komponen'] && $sama['subkomponen']) )
    <tr class="bg-lime-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-8 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['subkomponen'][$o] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['subkomponen'][$o] }}</span>
        </td>
    </tr>
    <?php $o++; ?>
    @endif
    <!-- begin::Akun -->
    @if( !($sama['program'] && $sama['kegiatan'] && $sama['output'] && $sama['suboutput'] && $sama['komponen'] && $sama['subkomponen'] && $sama['akun']) )
    <tr class="bg-cyan-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-10 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $pokk['akun'][$p] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh_pokk['akun'][$p] }}</span>
        </td>
    </tr>
    <?php $p++; ?>
    @endif
    <!-- begin::Item Kegiatan -->
    <tr class="hover:bg-blue-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td>
            <span class="pl-16 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ ' - ' . $poks[$i]->item_kegiatan }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{ $poks[$i]->volume }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{ $poks[$i]->satuan }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $poks[$i]->harga }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $poks[$i]->jumlah }}</span>
        </td>
    </tr>
    <!-- end::Item Kegiatan -->
    <!-- end::Akun -->
    <!-- end::Sub Komponen -->
    <!-- end::Komponen -->
    <!-- end::Sub Output -->
    <!-- end::Output -->
    <!-- end::Kegiatan -->
    <!-- end::Program -->
    @endfor