<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Tambah Referensi Tahun {{$last_tahun}}</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('master.referensi.store', $last_tahun) }}" method="post">
                @csrf
                @method('POST')
                <input name="tahun" type="hidden" value="{{$last_tahun}}" />
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama KPA</span>
                        </label>
                        <input name="nama_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama KPA..." required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">NIP KPA</span>
                        </label>
                        <input name="nip_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP KPA..." required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama PPK</span>
                        </label>
                        <input name="nama_ppk" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama PPK..." required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">NIP PPK</span>
                        </label>
                        <input name="nip_ppk" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP PPK..." required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama Bendahara</span>
                        </label>
                        <input name="nama_bend" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Bendahara..." required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">NIP Bendahara</span>
                        </label>
                        <input name="nip_bend" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP Bendahara..." required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nomor DIPA</span>
                        </label>
                        <input name="no_dipa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor DIPA..." required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Tanggal DIPA</span>
                        </label>
                        <input name="tgl_dipa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nomor SK KPA</span>
                        </label>
                        <input name="no_sk_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor SK KPA..." required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Tanggal SK KPA</span>
                        </label>
                        <input name="tgl_sk_kpa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" required />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jalan</span>
                        </label>
                        <input name="jln" type="text" class="form-control form-control-solid" placeholder="Jl. Sisingamangaraja No. 2..." />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Kabupaten</span>
                        </label>
                        <input name="kab" type="text" class="form-control form-control-solid" placeholder="Kabupaten Aceh Barat..." />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Kodepos</span>
                        </label>
                        <input name="kodepos" type="text" class="form-control form-control-solid" placeholder="23617" />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Telp/Faks</span>
                        </label>
                        <input name="telp" type="text" class="form-control form-control-solid" placeholder="(62-655) 7553330" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Email</span>
                        </label>
                        <input name="email" type="text" class="form-control form-control-solid" placeholder="bps1107@bps.go.id" />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Website</span>
                        </label>
                        <input name="web" type="text" class="form-control form-control-solid" placeholder="acehbaratkab.bps.go.id" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('no-surat.fp.index') }}" class="btn btn-light me-3">Kembali</a>
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