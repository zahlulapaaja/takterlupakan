<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.tim.index') }}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Daftar Tim Kerja</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('master.tim.create') }}" class="btn btn-sm btn-light btn-active-primary">
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
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-400px">Tahun</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($list_tahun as $thn)
                        <tr>
                            <td>
                                <span class="text-gray-900 fw-bold text-hover-primary d-block fs-6">Tim Kerja Tahun {{ $thn->tahun }}</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{route('master.tim.list', $thn->tahun)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-book-open fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
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
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: 1
                }],
                "bDestroy": true,
            });
        });
    </script>
    @endpush
</x-default-layout>