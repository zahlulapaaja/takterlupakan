<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.pegawai.index') }}
    @endsection

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <div class="d-flex flex-column">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Daftar Pegawai</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
                    </h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-4">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input id="searchPegawai" type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search..." />
                    </div>
                    <!--end::Search-->
                </div>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Export-->
                    <a id="export" href="{{route('master.pegawai.export')}}" class="btn btn-light-primary me-3">
                        <i class="ki-duotone ki-exit-up fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Export</a>
                    <!--end::Export-->
                    <!--begin::Add Pegawai-->
                    <a href="{{route('master.pegawai.create')}}" class="btn btn-primary">
                        <i class="ki-duotone ki-plus fs-2"></i>
                        Tambah
                    </a>
                    <!--end::Add Pegawai-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_pegawais">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">Nama</th>
                        <th class="text-center min-w-125px">NIP</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @forelse($data as $p)
                    <tr id="{{$p->id}}">
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="{{ route('master.pegawai.show', $p->id) }}">
                                        <div class="symbol-label">
                                            <img src="{{Storage::url($p->avatar)}}" alt="{{$p->nama}}" class="w-100" />
                                        </div>
                                    </a>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    <a href="{{ route('master.pegawai.show', $p->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $p->nama }}</a>
                                    <span>{{ $p->email }}</span>
                                </div>
                                <!--begin::User details-->
                            </div>
                        </td>
                        <td class="text-center">{{ $p->nip_baru }}</td>
                        <td class="grid justify-items-end">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('master.pegawai.edit', $p->id) }}" class="btn btn-primary btn-active-primary btn-flex btn-center btn-sm mx-1 my-2">Edit</a>
                                <a href="#" data-id="{{$p->id}}" data-name="{{$p->nama}}" class="btn btn-danger btn-active-danger-primary btn-flex btn-center btn-sm mx-1 my-2 modal-delete">
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No Data Found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kt_table_pegawais').DataTable({
                "bDestroy": true,
            });

            let table = new DataTable('#kt_table_pegawais');
            $('#searchPegawai').on('keyup', function() {
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
                        var url = "{{route('master.pegawai.destroy',':id')}}";
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