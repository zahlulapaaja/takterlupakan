<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.index') }}
    @endsection


    <!--begin::Row-->
    <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-xl-6 mb-xxl-10">
            <!--begin::Card widget 8-->
            <a href="{{route('master.referensi.index')}}" class="card overflow-hidden h-md-50 mb-5 mb-xl-10 hover:bg-blue-200">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <!--begin::Statistics-->
                    <div class="mb-4 px-9">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">Referensi</span>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">{{config('constants.SATKER')}}</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Card body-->
            </a>
            <!--end::Card widget 8-->
            <!--begin::Card widget 8-->
            <a href="{{route('master.pegawai.index')}}" class="card card-flush h-md-50 mb-xl-10 hover:bg-blue-200">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <!--begin::Statistics-->
                    <div class="mb-4 px-9">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">Pegawai</span>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">{{config('constants.SATKER')}}</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Card body-->
            </a>
            <!--end::Card widget 8-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-xl-6 mb-xxl-10">
            <!--begin::Card widget 8-->
            <a href="{{route('master.tim.index')}}" class="card overflow-hidden h-md-50 mb-5 mb-xl-10 hover:bg-blue-200">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <!--begin::Statistics-->
                    <div class="mb-4 px-9">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">Tim Kerja</span>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">{{config('constants.SATKER')}}</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Card body-->
            </a>
            <!--end::Card widget 8-->
            <!--begin::Card widget 8-->
            <a href="{{route('master.mitra.index')}}" class="card overflow-hidden h-md-50 mb-5 mb-xl-10 hover:bg-blue-200">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <!--begin::Statistics-->
                    <div class="mb-4 px-9">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">Mitra</span>
                            <!--end::Value-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-500">{{config('constants.SATKER')}}</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Card body-->
            </a>
            <!--end::Card widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-default-layout>