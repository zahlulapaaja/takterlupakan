<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
    <!--begin::Table head-->
    <thead>
        <tr class="fw-bold text-muted">
            <th class="w-25px">
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                </div>
            </th>
            <th class="min-w-100px">Nomor</th>
            <th class="min-w-50px">Jenis</th>
            <th class="min-w-150px">Rincian</th>
            <th class="min-w-100px">Tanggal</th>
            <th class="min-w-100px text-end">Actions</th>
        </tr>
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
        @foreach($data as $d)
        <tr id="{{$d->id}}">
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                </div>
            </td>
            <td>
                <span class="text-gray-900 fw-bold text-hover-primary d-block fs-6">{{ $d->no }}</span>
            </td>
            <td>
                @if($d->jenis == 'masuk')
                <div class="badge badge-light bg-green-300 fw-bold">{{$d->jenis}}</div>
                @else
                <div class="badge badge-light bg-blue-300 fw-bold">{{$d->jenis}}</div>
                @endif
            </td>
            <td>
                <span class="text-gray-900 d-block fs-6">{{$d->rincian}}</span>
            </td>
            <td>
                <span class="text-gray-900 d-block fs-6">{{$d->tgl}}</span>
            </td>
            <td>
                <div class="d-flex justify-content-end flex-shrink-0">
                    <a href="{{route('no-surat.masuk-keluar.show', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-information fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                    <a href="{{route('no-surat.masuk-keluar.edit', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-pencil fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <a href="#" data-id="{{$d->id}}" data-name="{{$d->no}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
                        <i class="ki-duotone ki-trash fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </a>
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

        $(document.body).on('click', '.modal-delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');

            // Show confirmation popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            Swal.fire({
                text: "Anda yakin ingin menghapus data " + name + " ?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function(result) {
                if (result.value) {
                    var url = "{{route('no-surat.masuk-keluar.destroy',':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    text: "Data berhasil dihapus",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-success",
                                    }
                                });

                                table.rows("#" + id + "").remove().draw();
                            }
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    modal.hide(); // Hide modal				
                }
            });
        });
    });
</script>
@endpush