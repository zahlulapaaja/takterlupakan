<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Master Referensi</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('master.referensi.create') }}" class="btn btn-sm btn-light btn-active-primary">
                    <i class="ki-duotone ki-plus fs-2"></i>Tambah</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
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
                                <span class="text-gray-900 fw-bold text-hover-primary d-block fs-6">Referensi Tahun {{ $thn->tahun }}</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{route('master.referensi.edit', $thn->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2">
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
                "bDestroy": true,
            });

            $('#searchFp').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    @endpush
</x-default-layout>