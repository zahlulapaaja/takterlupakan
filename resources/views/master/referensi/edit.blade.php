<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Edit Referensi Tahun {{$data->tahun}}</span>
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
                <input name="tahun" type="hidden" value="{{$data->tahun}}" />
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama KPA</span>
                        </label>
                        <input name="nama_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama KPA..." value="{{$data->nama_kpa}}" required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">NIP KPA</span>
                        </label>
                        <input name="nip_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP KPA..." value="{{$data->nip_kpa}}" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama PPK</span>
                        </label>
                        <input name="nama_ppk" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama PPK..." value="{{$data->nama_ppk}}" required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">NIP PPK</span>
                        </label>
                        <input name="nip_ppk" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP PPK..." value="{{$data->nip_ppk}}" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama Bendahara</span>
                        </label>
                        <input name="nama_bend" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Bendahara..." value="{{$data->nama_bend}}" required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">NIP Bendahara</span>
                        </label>
                        <input name="nip_bend" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP Bendahara..." value="{{$data->nip_bend}}" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nomor DIPA</span>
                        </label>
                        <input name="no_dipa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor DIPA..." value="{{$data->no_dipa}}" required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Tanggal DIPA</span>
                        </label>
                        <input name="tgl_dipa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" value="{{$data->tgl_dipa}}" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nomor SK KPA</span>
                        </label>
                        <input name="no_sk_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor SK KPA..." value="{{$data->no_sk_kpa}}" required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Tanggal SK KPA</span>
                        </label>
                        <input name="tgl_sk_kpa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" value="{{$data->tgl_sk_kpa}}" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jalan</span>
                        </label>
                        <input name="jln" type="text" class="form-control form-control-solid" placeholder="Jl. Sisingamangaraja No. 2..." value="{{$data->jln}}" />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Kabupaten</span>
                        </label>
                        <input name="kab" type="text" class="form-control form-control-solid" placeholder="Kabupaten Aceh Barat..." value="{{$data->kab}}" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Kodepos</span>
                        </label>
                        <input name="kodepos" type="text" class="form-control form-control-solid" placeholder="23617" value="{{$data->kodepos}}" />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Telp/Faks</span>
                        </label>
                        <input name="tlp" type="text" class="form-control form-control-solid" placeholder="(62-655) 7553330" value="{{$data->tlp}}" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Email</span>
                        </label>
                        <input name="email" type="text" class="form-control form-control-solid" placeholder="bps1107@bps.go.id" value="{{$data->email}}" />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Website</span>
                        </label>
                        <input name="web" type="text" class="form-control form-control-solid" placeholder="acehbaratkab.bps.go.id" value="{{$data->web}}" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('master.referensi.index') }}" class="btn btn-light me-3">Kembali</a>
                    <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 9-->
</x-default-layout>