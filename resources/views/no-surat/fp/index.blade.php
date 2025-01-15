<x-default-layout>

    @section('title')
    Nomor Surat
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('no-surat.fp.index') }}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">No Surat Form Permintaan</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
            <div class="card-toolbar">
                <a id="export" href="{{route('no-surat.fp.export', 0)}}" class="btn btn-sm btn-light btn-active-primary me-2">
                    <i class="ki-document ki-solid fs-2"></i>Export</a>
                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Klik untuk tambah nomor">
                    <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_nofp">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah</a>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Compact form-->
                <div class="d-flex justify-between align-items-center mb-4">
                    <!--begin::Input group-->
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input id="searchFp" type="search" class="form-control form-control-solid ps-10" placeholder="Search" />
                    </div>
                    <!--end::Input group-->
                    <div>
                        <select id="tahun" class="form-control">
                            <option value="0">-- Pilih Tahun --</option>
                            @foreach($tahun as $t)
                            <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--end::Compact form-->
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-200px">Nomor</th>
                            <th class="min-w-150px">Rincian</th>
                            <th class="min-w-100px">Tanggal</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data yang tersedia</td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                // serverSide: true,
                order: [],
                ajax: {
                    url: "{{ route('no-surat.fp.index') }}",
                    data: function(d) {
                        d.tahun = $('#tahun').val(),
                            d.search = $('#searchFp').val();
                    }
                },
                columns: [{
                        data: 'no_surat',
                        name: 'no_surat',
                        className: 'fw-bold text-hover-primary'
                    },
                    {
                        data: 'rincian',
                        name: 'rincian'
                    },
                    {
                        data: 'tgl',
                        name: 'tgl',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'p-0',
                        sortable: false
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('id', data.id);
                },
                initComplete: function(settings, json) {
                    $('.sorting_disabled').removeClass('p-0');
                }
            });

            $('#searchFp').on('keyup', function() {
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
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.value) {
                        var url = "{{route('no-surat.fp.destroy',':id')}}";
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

            $('#tahun').change(function() {
                tahun = $('#tahun').val();
                var url = "{{route('no-surat.fp.export',':tahun')}}";
                url = url.replace(':tahun', tahun);
                $("#export").attr("href", url);
                table.ajax.reload();
                // table.draw();
            });

        });
    </script>
    @endpush
</x-default-layout>