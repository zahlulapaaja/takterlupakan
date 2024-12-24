<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Detail Tim Kerja</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('master.tim.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tahun</span>
                        </label>
                        <input name="tahun" type="number" class="form-control form-control-solid" placeholder="2024" value="{{$data->tahun}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Kode Surat</span>
                        </label>
                        <input name="kode" type="text" class="form-control form-control-solid" placeholder="1107X" value="{{$data->kode}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span>Nama Tim</span>
                    </label>
                    <input name="nama" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Tim Kerja..." value="{{$data->nama}}" disabled />
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Ketua Tim</span>
                        </label>
                        <select name="ketua" class="form-control form-control-solid" disabled>
                            <option value="{{$data->ketua->id}}" selected hidden>{{$data->ketua->nama}}</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Singkatan Nama Tim</span>
                        </label>
                        <input name="singkatan" type="text" class="form-control form-control-solid" placeholder="Masukkan Singkatan Nama Tim..." value="{{$data->singkatan}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('master.tim.list', $data->tahun) }}" class="btn btn-light me-3">Kembali</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 9-->
</x-default-layout>