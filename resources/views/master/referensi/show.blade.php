<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Detail Referensi Tahun {{$data->tahun}}</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('master.referensi.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7">
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span>KPA (Kuasa Pengguna Anggaran)</span>
                    </label>
                    <select name="kpa" type="text" class="form-control form-control-solid" disabled>
                        <option value="{{$data->kpa->id}}" hidden selected>{{$data->kpa->nama}}</option>
                    </select>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>PPK</span>
                        </label>
                        <select name="ppk" type="text" class="form-control form-control-solid" disabled>
                            <option value="{{$data->ppk->id}}" hidden selected>{{$data->ppk->nama}}</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Bendahara</span>
                        </label>
                        <select name="bend" type="text" class="form-control form-control-solid" disabled>
                            <option value="{{$data->bend->id}}" hidden selected>{{$data->bend->nama}}</option>
                        </select>
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nomor DIPA</span>
                        </label>
                        <input name="no_dipa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor DIPA..." value="{{$data->no_dipa}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tanggal DIPA</span>
                        </label>
                        <input name="tgl_dipa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" value="{{$data->tgl_dipa}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nomor SK KPA</span>
                        </label>
                        <input name="no_sk_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor SK KPA..." value="{{$data->no_sk_kpa}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tanggal SK KPA</span>
                        </label>
                        <input name="tgl_sk_kpa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" value="{{$data->tgl_sk_kpa}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-right pt-15">
                    <a href="{{ route('master.referensi.index') }}" class="btn btn-light me-3">Kembali</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 9-->
</x-default-layout>