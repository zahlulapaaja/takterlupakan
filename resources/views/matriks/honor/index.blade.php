<x-default-layout>

    @section('title')
    Matriks
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('matriks.honor.index') }}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Matriks Honor</span>
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
                            <th class="min-w-100px">Tahun</th>
                            <th class="min-w-100px">Bulan</th>
                            <th class="min-w-100px">Jumlah Orang</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($data as $d)
                        <tr id="{{$d->id}}" class="hover:bg-blue-200">
                            <td>
                                <span class="text-gray-900 d-block fs-6">{{$d->tahun}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6">{{$d->bulan}}</span>
                            </td>
                            <td>
                                <span class="text-gray-900 d-block fs-6">{{$d->jumlah}} Orang</span>
                            </td>
                            <td class="p-0">
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{route('matriks.honor.list', [$d->tahun, $d->bulan])}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-menu fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
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
        });
    </script>
    @endpush
</x-default-layout>