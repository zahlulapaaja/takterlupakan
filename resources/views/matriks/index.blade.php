<x-default-layout>

    @section('title')
    Matriks
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('matriks.index') }}
    @endsection


    <!--begin::Row-->
    <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-xl-6 mb-xxl-10">
            <!--begin::Card widget 8-->
            <a href="{{route('matriks.honor.index')}}" class="card overflow-hidden mb-5 mb-xl-10 hover:bg-blue-200">
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <div class="mb-4 px-9">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">Matriks Honor</span>
                        </div>
                        <span class="fs-6 fw-semibold text-gray-500">{{config('constants.SATKER')}}</span>
                    </div>
                </div>
            </a>
            <!--end::Card widget 8-->
            <!--begin::Card widget 8-->
            <!-- <a href="{{route('master.pegawai.index')}}" class="card card-flush h-md-50 mb-xl-10 hover:bg-blue-200">
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <div class="mb-4 px-9">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">Pegawai</span>
                        </div>
                        <span class="fs-6 fw-semibold text-gray-500">{{config('constants.SATKER')}}</span>
                    </div>
                </div>
            </a> -->
            <!--end::Card widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-default-layout>