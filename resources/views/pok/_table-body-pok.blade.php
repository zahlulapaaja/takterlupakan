<?php $j = $k = $l = $m = $n = $o = $p = 0; ?>
<?php $q = 1;
// dd($data); 
?>
@for ($i = 0; $i < count($data); $i++)
    <?php
    if ($i > 0) {
        $data->sama['program'] = $data[$i]->kode_program == $data[$i - 1]->kode_program;
        $data->sama['kegiatan'] = $data[$i]->kode_kegiatan == $data[$i - 1]->kode_kegiatan;
        $data->sama['output'] = $data[$i]->kode_output == $data[$i - 1]->kode_output;
        $data->sama['suboutput'] = $data[$i]->kode_suboutput == $data[$i - 1]->kode_suboutput;
        $data->sama['komponen'] = $data[$i]->kode_komponen == $data[$i - 1]->kode_komponen;
        $data->sama['subkomponen'] = $data[$i]->kode_subkomponen == $data[$i - 1]->kode_subkomponen;
        $data->sama['akun'] = $data[$i]->kode_akun == $data[$i - 1]->kode_akun;
    } else {
        // jadi baris nol akan dianggap true semua nanti
        $data->sama['program'] = false;
        $data->sama['kegiatan'] = false;
        $data->sama['output'] = false;
        $data->sama['suboutput'] = false;
        $data->sama['komponen'] = false;
        $data->sama['subkomponen'] = false;
        $data->sama['akun'] = false;
    }
    ?>
    <!-- begin::Program -->
    @if( !$data->sama['program'] )
    <tr class="bg-red-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-0 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['program'][$j] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['program'][$j]) }}</span>
        </td>
    </tr>
    <?php $j++; ?>
    @endif
    <!-- begin::Kegiatan -->
    @if( !($data->sama['program'] && $data->sama['kegiatan']) )
    <tr class="bg-orange-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-2 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['kegiatan'][$k] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['kegiatan'][$k]) }}</span>
        </td>
    </tr>
    <?php $k++; ?>
    @endif
    <!-- begin::Output -->
    @if( !($data->sama['program'] && $data->sama['kegiatan'] && $data->sama['output']) )
    <tr class="bg-amber-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-4 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['output'][$l] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['output'][$l]) }}</span>
        </td>
    </tr>
    <?php $l++; ?>
    @endif
    <!-- begin::Sub Output -->
    @if( !($data->sama['program'] && $data->sama['kegiatan'] && $data->sama['output'] && $data->sama['suboutput']) )
    <tr class="bg-yellow-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-6 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['suboutput'][$m] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['suboutput'][$m]) }}</span>
        </td>
    </tr>
    <?php $m++; ?>
    @endif
    <!-- begin::Komponen -->
    @if( !($data->sama['program'] && $data->sama['kegiatan'] && $data->sama['output'] && $data->sama['suboutput'] && $data->sama['komponen']) )
    <tr class="bg-lime-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-8 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['komponen'][$n] }}</span>
        </td>
        <td class="p-0">
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['komponen'][$n]) }}</span>
        </td>
        <td class="bg-white">
            <form method="post" action="{{ route('kegiatan.kak.create') }}" class="text-gray-900 fw-semibold text-center text-hover-black d-block">
                @csrf
                @method('POST')
                <input type="hidden" name="id_pok" value="{{$data[$i]->id}}" />
                <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-md text-white px-4"> KAK </button>
            </form>
        </td>
    </tr>
    <?php $n++; ?>
    @endif
    <!-- begin::Sub Komponen -->
    @if( !($data->sama['program'] && $data->sama['kegiatan'] && $data->sama['output'] && $data->sama['suboutput'] && $data->sama['komponen'] && $data->sama['subkomponen']) )
    <tr class="bg-lime-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-8 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['subkomponen'][$o] }}</span>
        </td>
        <td class="p-0">
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['subkomponen'][$o]) }}</span>
        </td>
        <td class="bg-white">
            <form method="post" action="{{ route('kegiatan.sk.create') }}" class="text-gray-900 fw-semibold text-center text-hover-black d-block">
                @csrf
                @method('POST')
                <input type="hidden" name="kode_kegiatan" value="{{$data[$i]->kode_kegiatan}}" />
                <input type="hidden" name="kode_output" value="{{$data[$i]->kode_output}}" />
                <input type="hidden" name="output" value="{{$data[$i]->output}}" />
                <input type="hidden" name="kode_suboutput" value="{{$data[$i]->kode_suboutput}}" />
                <input type="hidden" name="suboutput" value="{{$data[$i]->suboutput}}" />
                <input type="hidden" name="kode_komponen" value="{{$data[$i]->kode_komponen}}" />
                <input type="hidden" name="komponen" value="{{$data[$i]->komponen}}" />
                <input type="hidden" name="id_pok" value="{{$data[$i]->id}}" />
                <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-md text-white px-4"> SK </button>
            </form>
        </td>
    </tr>
    <?php $o++; ?>
    @endif
    <!-- begin::Akun -->
    @if( !($data->sama['program'] && $data->sama['kegiatan'] && $data->sama['output'] && $data->sama['suboutput'] && $data->sama['komponen'] && $data->sama['subkomponen'] && $data->sama['akun']) )
    <tr class="bg-cyan-300">
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{$q++}}</span>
        </td>
        <td colspan="4">
            <span class="pl-10 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ $data->pokk['akun'][$p] }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data->jlh_pokk['akun'][$p]) }}</span>
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
            <span class="pl-16 text-gray-900 fw-bold text-hover-black mb-1 fs-6">{{ ' - ' . $data[$i]->item_kegiatan }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{ $data[$i]->volume }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-center text-hover-black d-block fs-6">{{ $data[$i]->satuan }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data[$i]->harga) }}</span>
        </td>
        <td>
            <span class="text-gray-900 fw-semibold text-right text-hover-black d-block fs-6">{{ currency_IDR($data[$i]->jumlah) }}</span>
        </td>
        @if(in_array($data[$i]->kode_akun, config('constants.LIST_AKUN_INPUT')))
        <td class="bg-white">
            <form method="post" action="{{ route('kegiatan.create') }}" class="text-gray-900 fw-semibold text-center text-hover-black d-block">
                @csrf
                @method('POST')
                <input type="hidden" name="poks_id" value="{{$data[$i]->id}}" />
                <button type="submit" class="bg-violet-500 hover:bg-violet-700 rounded-md text-white px-4"> Input </button>
            </form>
        </td>
        @endif
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