<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.spj.index') }}
    @endsection

    <!--begin::Tables Widget 5-->
    <div class="card h-md-100">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Daftar SPJ</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
            <div class="card-toolbar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4 me-1 active" data-bs-toggle="tab" href="#table_spj_tab_1">Honor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4 me-1" data-bs-toggle="tab" href="#table_spj_tab_2">Translok</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <div class="tab-content">
                <!--begin::Tap pane-->
                <div class="tab-pane fade show active" id="table_spj_tab_1">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                        </div>
                                    </th>
                                    <th class="w-50px">Akun</th>
                                    <th class="min-w-150px">Kegiatan</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach($data_honor as $d)
                                <tr id="{{$d->id}}">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success">{{$d->kode_akun}}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">{{$d->keg->nama}}</a>
                                        <span class="text-muted fw-semibold d-block">{{$d->tgl}}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-duotone ki-switch fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a href="{{ route('kegiatan.spj.print', $d->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank">
                                                <i class="ki-duotone ki-printer fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </a>
                                            <a href="{{route('kegiatan.spj.edit', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a href="#" data-id="{{$d->id}}" data-name="{{$d->keg->nama}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
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
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Tap pane-->
                <!--begin::Tap pane-->
                <div class="tab-pane fade" id="table_spj_tab_2">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                        </div>
                                    </th>
                                    <th class="w-50px">Akun</th>
                                    <th class="min-w-150px">Kegiatan</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach($data_translok as $d)
                                <tr id="{{$d->id}}">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-info">{{$d->kode_akun}}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">{{$d->keg->nama}}</a>
                                        <span class="text-muted fw-semibold d-block">{{$d->tgl}}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-duotone ki-switch fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a href="{{ route('kegiatan.spj.print', $d->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank">
                                                <i class="ki-duotone ki-printer fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </a>
                                            <a href="{{route('kegiatan.spj.edit', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a href="#" data-id="{{$d->id}}" data-name="{{$d->keg->nama}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
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
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Tap pane-->
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 5-->
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let table = $('.datatable').DataTable({
                "bDestroy": true,
            });

            $('#searchSpj').on('keyup', function() {
                table.search(this.value).draw();
            });

            $(document.body).on('click', '.modal-delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Show confirmation popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Anda yakin ingin menghapus spj " + name + " ?",
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
                        var url = "{{route('kegiatan.spj.destroy',':id')}}";
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
</x-default-layout>