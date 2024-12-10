<!-- foreach ($poks as $i => $pok) -->
@for ($i = 0; $i < 593; $i++)
    <!-- begin::Program -->
    @if( $i == 0 || $poks[$i]->kode_program != $poks[$i-1]->kode_program )
    <?php $jlh['program'] += $poks[$i]->jumlah ?>
    <tr class="bg-blue-400 hover:bg-blue-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_program . ' : ' . $poks[$i]->program }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['program'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Kegiatan -->
    @if( $i == 0 || $poks[$i]->kode_kegiatan != $poks[$i-1]->kode_kegiatan )
    <?php $jlh['kegiatan'] += $poks[$i]->jumlah ?>
    <tr class="bg-yellow-400 hover:bg-yellow-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_kegiatan . ' : ' . $poks[$i]->kegiatan }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['kegiatan'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Output -->
    @if( $i == 0 || $poks[$i]->kode_output != $poks[$i-1]->kode_output )
    {{ $jlh['output'] += $poks[$i]->jumlah }}
    <tr class="bg-yellow-400 hover:bg-yellow-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_output . ' : ' . $poks[$i]->output }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['output'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Sub Output -->
    @if( $i == 0 || $poks[$i]->kode_suboutput != $poks[$i-1]->kode_suboutput )
    {{ $jlh['suboutput'] += $poks[$i]->jumlah }}
    <tr class="bg-yellow-400 hover:bg-yellow-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_suboutput . ' : ' . $poks[$i]->suboutput }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['suboutput'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Komponen -->
    @if( $i == 0 || $poks[$i]->kode_komponen != $poks[$i-1]->kode_komponen )
    {{ $jlh['komponen'] += $poks[$i]->jumlah }}
    <tr class="bg-yellow-400 hover:bg-yellow-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_komponen . ' : ' . $poks[$i]->komponen }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['komponen'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Sub Komponen -->
    @if( $i == 0 || $poks[$i]->kode_subkomponen != $poks[$i-1]->kode_subkomponen )
    {{ $jlh['subkomponen'] += $poks[$i]->jumlah }}
    <tr class="bg-yellow-400 hover:bg-yellow-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_subkomponen . ' : ' . $poks[$i]->subkomponen }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['subkomponen'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Akun -->
    @if( $i == 0 || $poks[$i]->kode_akun != $poks[$i-1]->kode_akun )
    {{ $jlh['akun'] += $poks[$i]->jumlah }}
    <tr class="bg-yellow-400 hover:bg-yellow-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ $poks[$i]->kode_akun . ' : ' . $poks[$i]->akun }}</a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ $jlh['akun'] }}</span>
        </td>
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
        </td>
    </tr>
    @endif
    <!-- begin::Item Kegiatan -->
    <tr class="hover:bg-red-600">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
        </td>
        <td>
            <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">{{ ' - ' . $poks[$i]->item_kegiatan }}</a>
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
        <td class="text-end">
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
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
    <!-- endforeach -->
    @endfor

    <!-- <tr class="bg-blue-400 hover:bg-blue-600">
    <td>
        <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$i+1}}</span>
    </td>
    <td>
        <a href="#" class="text-gray-900 fw-bold text-hover-black text-nowrap mb-1 fs-6">pok->kode_program . ' : ' . pok->program </a>
    </td>
    <td>
        <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">10</span>
    </td>
    <td>
        <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">THN</span>
    </td>
    <td>
        <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">3.711.789.000</span>
    </td>
    <td>
        <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">3.711.789.000</span>
    </td>
    <td class="text-end">
        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
    </td>
</tr> -->