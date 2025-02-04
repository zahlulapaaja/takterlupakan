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
                <span class="card-label fw-bold fs-3 mb-1">Daftar Bukti Dukung SPJ</span>
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
                        <!--begin::Compact form-->
                        <div class="d-flex flex-column flex-lg-row justify-between gap-y-3 mb-4">
                            <!--begin::Input group-->
                            <div class="position-relative w-md-400px me-md-2">
                                <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input id="searchSpjHonor" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                            </div>
                            <!--end::Input group-->
                            <div class="flex flex-row gap-3">
                                <select id="tim1" class="form-control text-center">
                                    <option value="">-- Tim --</option>
                                </select>
                                <select id="tahun1" class="form-control text-center">
                                    <option value="">-- Tahun --</option>
                                    @foreach($list_tahun as $t)
                                    <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Compact form-->
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4 datatable-honor">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-50px">Akun</th>
                                    <th class="min-w-150px">Kegiatan</th>
                                    <th class="min-w-50px">Tim</th>
                                    <th class="min-w-50px">Tahun</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach($data_honor as $d)
                                <tr id="{{$d->id}}">
                                    <td>
                                        <span class="badge badge-light-success">{{$d->kode_akun}}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">{{Str::limit($d->nama_keg, 75)}}</a>
                                        <span class="text-muted fw-semibold d-block">{{date_indo($d->tgl)}}</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-900 d-block fs-6">{{$d->nama_tim}}</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-900 d-block fs-6">{{$d->tahun}}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="{{ route('kegiatan.spj.print', [$d->id, 0]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank">
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
                                            <a href="#" data-id="{{$d->id}}" data-name="{{$d->nama_keg}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
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
                        <!--begin::Compact form-->
                        <div class="d-flex flex-column flex-lg-row justify-between gap-y-3 mb-4">
                            <!--begin::Input group-->
                            <div class="position-relative w-md-400px me-md-2">
                                <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input id="searchSpjTranslok" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                            </div>
                            <!--end::Input group-->
                            <div class="flex flex-row gap-3">
                                <select id="tim2" class="form-control text-center">
                                    <option value="">-- Tim --</option>
                                </select>
                                <select id="tahun2" class="form-control text-center">
                                    <option value="">-- Tahun --</option>
                                    @foreach($list_tahun as $t)
                                    <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Compact form-->
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4 datatable-translok">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-50px">Akun</th>
                                    <th class="min-w-150px">Kegiatan</th>
                                    <th class="min-w-50px">Tim</th>
                                    <th class="min-w-50px">Tahun</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach($data_translok as $d)
                                <tr id="{{$d->id}}">
                                    <td>
                                        <span class="badge badge-light-info">{{$d->kode_akun}}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">{{Str::limit($d->nama_keg, 100)}}</a>
                                        <span class="text-muted fw-semibold d-block">{{date_indo($d->tgl)}}</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-900 d-block fs-6">{{$d->nama_tim}}</span>
                                    </td>
                                    <td>
                                        <span class="text-gray-900 d-block fs-6">{{$d->tahun}}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="{{ route('kegiatan.spj.print', [$d->id, 0]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="ST">
                                                <i class="ki-duotone ki-printer fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </a>
                                            <a href="{{ route('kegiatan.spj.print', [$d->id, 1]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Kwitansi">
                                                <i class="ki-duotone ki-printer fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </a>
                                            <a href="{{ route('kegiatan.spj.print', [$d->id, 2]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Pengeluaran Riil">
                                                <i class="ki-duotone ki-printer fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </a>
                                            <a href="{{ route('kegiatan.spj.print', [$d->id, 3]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Nominatif">
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
                                            <a href="#" data-id="{{$d->id}}" data-name="{{$d->nama_keg}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
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
            let table1 = $('.datatable-honor').DataTable({
                processing: true,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: 4
                }],
                "bDestroy": true,
            });

            let table2 = $('.datatable-translok').DataTable({
                processing: true,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: 4
                }],
                "bDestroy": true,
            });

            $('#searchSpjHonor').on('keyup', function() {
                table1.search(this.value).draw();
            });

            $('#searchSpjTranslok').on('keyup', function() {
                table2.search(this.value).draw();
            });

            $('#tahun1').change(function() {
                tahun1 = $('#tahun1').val();

                $('#tim1').html('<option value="">-- Tim --</option>');
                $.ajax({
                    url: "{{url('api/fetch-tim')}}",
                    type: "POST",
                    data: {
                        tahun: tahun1,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.each(res.tim, function(key, value) {
                            $("#tim1").append('<option value="' +
                                value.singkatan + '">' + value.singkatan + '</option>');
                        });
                    }
                });

                table1.columns(2).search('').draw();
                table1.columns(3).search(tahun1).draw();
            });

            $('#tim1').on('change', function() {
                var selectedTim = $(this).val();
                table1.columns(2).search(selectedTim).draw();
            });

            $('#tahun2').change(function() {
                tahun2 = $('#tahun2').val();

                $('#tim2').html('<option value="">-- Tim --</option>');
                $.ajax({
                    url: "{{url('api/fetch-tim')}}",
                    type: "POST",
                    data: {
                        tahun: tahun2,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.each(res.tim, function(key, value) {
                            $("#tim2").append('<option value="' +
                                value.singkatan + '">' + value.singkatan + '</option>');
                        });
                    }
                });

                table2.columns(2).search('').draw();
                table2.columns(3).search(tahun2).draw();
            });

            $('#tim2').on('change', function() {
                var selectedTim = $(this).val();
                table2.columns(2).search(selectedTim).draw();
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
                        confirmButton: "btn btn-danger",
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

                                    table1.rows("#" + id + "").remove().draw();
                                    table2.rows("#" + id + "").remove().draw();
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