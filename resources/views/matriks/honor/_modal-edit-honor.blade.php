<!--begin::Modal - edit honor-->
<div class="modal fade" id="kt_modal_edit_honor_{{$d->id}}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_edit_honor_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Matriks Honor</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_edit_honor_form" class="form" action="{{ route('matriks.honor.update', $d->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_edit_honor_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_honor_header" data-kt-scroll-wrappers="#kt_modal_edit_honor_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="tahun" value="{{$tahun}}" />
                        <input type="hidden" name="bulan" value="{{$bulan}}" />
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">No BAST</label>
                            <input type="text" name="no_bast" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0001" value="{{$d->no_bast}}" required />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Kegiatan</label>
                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$d->nama_keg}}" disabled />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Nama</label>
                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$d->nama}}" disabled />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Sebagai</label>
                            <input type="text" name="sebagai" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="sebagai..." value="{{$d->sebagai}}" required />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Harga Satuan</label>
                            <input type="number" name="harga" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="harga..." value="{{$d->harga}}" required />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Volume</label>
                            <input type="number" name="volume" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="volume..." value="{{$d->volume}}" required />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Tanggal BAST</label>
                            <input type="date" name="tgl_bast" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tanggal BAST..." value="{{$d->tgl_bast}}" required />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Tim</label>
                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$d->nama_tim}}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - edit honor-->