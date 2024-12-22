<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <div class="d-flex flex-column">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-4">Daftar Pegawai</span>
                    </h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
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
                    <!--begin::Add Pegawai-->
                    <a href="{{route('master.pegawai.create')}}" class="btn btn-primary">
                        <i class="ki-duotone ki-plus fs-2"></i>
                        Tambah
                    </a>
                    <!--end::Add Pegawai-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_pegawais">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_pegawais .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Nama</th>
                        <th class="text-center min-w-125px">NIP</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @forelse($data as $p)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td class="d-flex align-items-center">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="{{ route('master.pegawai.show', $p->id) }}">
                                    <div class="symbol-label">
                                        <img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
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
                        </td>
                        <td class="text-center">{{ $p->nip_baru }}</td>
                        <td class="grid justify-items-end">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('master.pegawai.edit', $p->id) }}" class="btn btn-primary btn-active-primary btn-flex btn-center btn-sm mx-1 my-2">Edit</a>
                                <form class="btn btn-danger btn-active-danger-primary btn-flex btn-center btn-sm mx-1 my-2" method="POST" action="{{ route('master.pegawai.destroy', $p->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <input style="all: unset" type="submit" value="Delete" />
                                </form>
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
                // serverSide: true,
                // processing: true,
                // ajax: {
                //     url: '{{ route("user-management.users.index") }}'
                // },
                "bDestroy": true,
            });
        });

        let table = new DataTable('#kt_table_pegawais');
        $('#searchPegawai').on('keyup', function() {
            table.search(this.value).draw();
        });
    </script>
    @endpush
</x-default-layout>