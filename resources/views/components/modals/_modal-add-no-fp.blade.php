<!--begin::Modal - New Card-->
<div class="modal fade" id="add_nofp" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2>Tambah Nomor Form Permintaan</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<i class="ki-duotone ki-cross fs-1">
						<span class="path1"></span>
						<span class="path2"></span>
					</i>
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="modal_add_nofp_form" class="form" action="{{ route('no-surat.fp.store') }}" method="post">
					@csrf
					@method('POST')
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
						<input type="text" class="form-control form-control-solid" placeholder="0001" name="no" />
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
							<input type="text" class="form-control form-control-solid" placeholder="Masukkan rincian..." name="rincian" />
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
							<input type="date" class="form-control form-control-solid" name="tgl" />
							<!--end::Input-->
						</div>
						<!--end::Input wrapper-->
					</div>
					<!--end::Input group-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
						<button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
							<span class="indicator-label">Submit</span>
							<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
<!--end::Modal - New Card-->