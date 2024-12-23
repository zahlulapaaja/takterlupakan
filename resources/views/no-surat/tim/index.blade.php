<x-default-layout>

    @section('title')
    Nomor Surat Tim
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">No Surat Tim Kerja</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Klik untuk tambah nomor">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_no_surat_tim">
                    <i class="ki-duotone ki-plus fs-2"></i>Tambah</a>
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
                        <input id="searchNoSurat" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Compact form-->
                <!--begin::Table-->
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
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->

    @include('no-surat.tim._modal-add-no-surat-tim')

    @push('scripts')
    <script type="text/javascript">
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
</x-default-layout>