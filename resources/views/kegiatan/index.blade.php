<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.index') }}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Daftar Kegiatan</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Input Kegiatan">
                <a href="{{ route('pok.index') }}" class="btn btn-sm btn-light btn-active-primary">
                    <i class="ki-duotone ki-plus fs-2"></i>Tambah
                </a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

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
                        <input id="searchSk" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                    </div>
                    <!--end::Input group-->
                    <div class="flex flex-row gap-3">
                        <select id="tim" class="form-control text-center">
                            <option value="">-- Tim --</option>
                        </select>
                        <select id="tahun" class="form-control text-center">
                            <option value="">-- Tahun --</option>
                            @foreach($list_tahun as $t)
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
                            <th class="min-w-200px">Kegiatan</th>
                            <th class="min-w-100px">MAK</th>
                            <th class="min-w-50px">Tim</th>
                            <th class="min-w-50px">Tahun</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($data as $d)
                        <tr id="{{$d->id}}" class="hover:bg-blue-200">
                            <td>
                                <span class="text-gray-900 fw-bold text-hover-primary d-block fs-6">{{Str::limit($d->nama, 75)}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6">{{$d->mak}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6">{{$d->tim->singkatan}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6">{{$d->tahun}}</span>
                            </td>
                            <td class="p-0">
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    @if($d->kode_akun == config('constants.AKUN_HONOR'))
                                    <form action="{{route('matriks.honor.create')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary me-1" method="post" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Matriks Honor">
                                        @csrf
                                        @method('POST')
                                        <input name="kegiatans_id" type="hidden" value="{{$d->id}}">
                                        <button type="submit">
                                            <i class="ki-duotone ki-menu fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                    </form>
                                    @endif
                                    <form action="{{route('kegiatan.spj.create')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary me-1" method="post" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Butki Dukung SPJ">
                                        @csrf
                                        @method('POST')
                                        <input name="kegiatans_id" type="hidden" value="{{$d->id}}">
                                        <button type="submit">
                                            <i class="ki-duotone ki-exit-right-corner fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </form>
                                    <a href="{{route('kegiatan.edit', $d->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <a href="#" data-id="{{$d->id}}" data-name="{{$d->nama}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
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
            let table = $('.datatable').DataTable({
                processing: true,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: 4
                }],
                "bDestroy": true,
            });

            $('#searchSk').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#tahun').change(function() {
                tahun = $('#tahun').val();

                $('#tim').html('<option value="">-- Tim --</option>');
                $.ajax({
                    url: "{{url('api/fetch-tim')}}",
                    type: "POST",
                    data: {
                        tahun: tahun,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $.each(res.tim, function(key, value) {
                            $("#tim").append('<option value="' +
                                value.singkatan + '">' + value.singkatan + '</option>');
                        });
                    }
                });

                table.columns(2).search('').draw();
                table.columns(3).search(tahun).draw();
            });

            $('#tim').on('change', function() {
                var selectedTim = $(this).val();
                table.columns(2).search(selectedTim).draw();
            });

            $(document.body).on('click', '.modal-delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Show confirmation popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                Swal.fire({
                    title: "Hapus Kegiatan!",
                    text: "Menghapus kegiatan berdampak pada seluruh dokumen yang telah dibuat! PAHAM!?!?",
                    icon: "warning",
                    confirmButtonText: "Paham",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                }).then(function(result) {
                    Swal.fire({
                        text: "Anda yakin ingin menghapus kegiatan " + name + " ?",
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
                            var url = "{{route('kegiatan.destroy',':id')}}";
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

        });
    </script>
    @endpush
</x-default-layout>