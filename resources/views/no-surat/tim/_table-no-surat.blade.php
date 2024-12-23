<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
    <!--begin::Table head-->
    <thead>
        <tr class="fw-bold text-muted">
            <th class="w-25px">
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                </div>
            </th>
            <th class="min-w-200px">Nomor</th>
            <th class="min-w-150px">Rincian</th>
            <th class="min-w-100px">Tanggal</th>
            <th class="min-w-100px text-end">Actions</th>
        </tr>
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                </div>
            </td>
            <td>
                <span class="text-gray-900 fw-bold text-hover-primary d-block fs-6">{{ $d->no_surat }}</span>
            </td>
            <td>
                <span class="text-gray-900 d-block fs-6">{{$d->rincian}}</span>
            </td>
            <td>
                <span class="text-gray-900 d-block fs-6">{{$d->tgl}}</span>
            </td>
            <td>
                <div class="d-flex justify-content-end flex-shrink-0">
                    <a href="{{route('no-surat.tim.show', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-information fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                    <a href="{{route('no-surat.tim.edit', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-pencil fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <form method="post" action="{{route('no-surat.tim.destroy', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-data">
                        @csrf
                        @method('DELETE')
                        <button style="all: unset" type="submit">
                            <i class="ki-duotone ki-trash fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                        </button>
                        </i>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <!--end::Table body-->
</table>

@push('scripts')
<script>
    $(document).ready(function() {
        let table = $('.datatable').DataTable({
            "bDestroy": true,
        });

        $('#searchNoSurat').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
@endpush