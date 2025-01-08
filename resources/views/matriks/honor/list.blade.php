<x-default-layout>

    @section('title')
    Matriks
    @endsection

    @section('breadcrumbs')
    <!-- Breadcrumbs::render('matriks.honor.list', $tahun . ':' . $bulan) -->
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Matriks Honor [{{sprintf('%02d', $bulan)}} : {{$tahun}}]</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Input Honor Dari Kegiatan">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-light btn-active-primary">
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
                <div class="d-flex align-items-center mb-4">
                    <!--begin::Input group-->
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input id="searchData" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Compact form-->
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted ">
                            <th class="min-25px">BAST</th>
                            <th class="min-w-200px">Kegiatan</th>
                            <th class="min-w-50px">Nama</th>
                            <th class="min-w-50px">Sebagai</th>
                            <th class="min-w-50px">Harga<br>Satuan</th>
                            <th class="min-w-50px">Vol</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($data as $d)
                        <tr id="{{$d->id}}" class="hover:bg-blue-200">
                            <td>
                                <span contenteditable="true" data-id="{{$d->id}}" data-column="no_bast" class="text-gray-900 d-block fs-6">{{$d->no_bast}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6 text-nowrap">{{$d->keg->nama}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6 text-nowrap">{{$d->nama}}</span>
                            </td>
                            <td>
                                <span contenteditable="true" data-id="{{$d->id}}" data-column="sebagai" class="text-gray-900 d-block fs-6 text-nowrap">{{$d->sebagai}}</span>
                            </td>
                            <td>
                                <span contenteditable="true" data-id="{{$d->id}}" data-column="harga" class="text-gray-900 d-block fs-6">{{$d->harga}}</span>
                            </td>
                            <td>
                                <span contenteditable="true" data-id="{{$d->id}}" data-column="volume" class="text-gray-900 d-block fs-6">{{$d->volume}}</span>
                            </td>
                            <td class="p-0">
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{ route('kegiatan.sk.print', $d->id) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary me-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="BAST">
                                        <button type="submit">
                                            <i class="ki-duotone ki-printer fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </button>
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
                "bDestroy": true,
            });

            $('#searchData').on('keyup', function() {
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
                        var url = "{{route('matriks.honor.destroy',':id')}}";
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

            $('span[contenteditable=true]').on('blur', function() {
                let id = $(this).data('id');
                let column = $(this).data('column');
                let value = $(this).text();

                var url = "{{route('matriks.honor.update',':id')}}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        column: column,
                        value: value
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                        } else {
                            alert('Update failed.');
                        }
                    }
                });
            });

        });
    </script>
    @endpush
</x-default-layout>