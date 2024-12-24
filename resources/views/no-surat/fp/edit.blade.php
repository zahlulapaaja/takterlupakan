<x-default-layout>

    @section('title')
    Nomor Surat
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Edit Nomor Surat Form Permintaan</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('no-surat.fp.update', ['fp' => $data->id]) }}" method="post">
                @csrf
                @method('PUT')
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span class="required">Nomor</span>
                        <!-- <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
								<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
								</i>
							</span> -->
                    </label>
                    <!--end::Label-->
                    <input id="nofp" type="text" class="form-control form-control-solid" placeholder="0001" name="no" value="{{ $data->no }}" />
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold form-label mb-2">Rincian</label>
                    <!--end::Label-->
                    <!--begin::Input wrapper-->
                    <div class="position-relative">
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan rincian..." name="rincian" value="{{ $data->rincian }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input wrapper-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold form-label mb-2">Tanggal</label>
                    <!--end::Label-->
                    <!--begin::Input wrapper-->
                    <div class="position-relative">
                        <!--begin::Input-->
                        <input type="date" class="form-control form-control-solid" name="tgl" value="{{ $data->tgl }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input wrapper-->
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