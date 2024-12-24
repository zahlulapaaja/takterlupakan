<!--begin::Modal - New Card-->
<div class="modal fade" id="add_no_surat_masuk_keluar" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2>Tambah Nomor Surat Masuk Keluar</h2>
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
				<form id="modal_add_no_surat_masuk_keluar_form" class="form" action="{{ route('no-surat.masuk-keluar.store') }}" method="post">
					@csrf
					@method('POST')
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Nomor</span>
						</label>
						<input name="no" type="text" class="form-control form-control-solid" placeholder="001" />
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Jenis</span>
						</label>
						<select id="jenis-dropdown-modal" name="jenis" class="form-control form-control-solid" data-placeholder="Pilih Tahun">
							<option hidden>Pilih Jenis...</option>
							<option value="masuk">Masuk</option>
							<option value="keluar">Keluar</option>
						</select>
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Tanggal</span>
						</label>
						<input name="tgl" type="date" class="form-control form-control-solid" />
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Rincian</span>
						</label>
						<input name="rincian" type="text" class="form-control form-control-solid" placeholder="Masukkan perihal..." />
					</div>
					<!--end::Input group-->
					<div class="masuk" hidden>
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-7 fv-row">
							<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
								<span class="required">Nomor Surat Masuk</span>
							</label>
							<input name="no_masuk" type="text" class="form-control form-control-solid" placeholder="Masukkan nomor surat masuk..." />
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-7 fv-row">
							<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
								<span class="required">Pengirim</span>
							</label>
							<input name="pengirim" type="text" class="form-control form-control-solid" placeholder="Masukkan pengirim surat..." />
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-7 fv-row">
							<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
								<span class="required">Tanggal Surat</span>
							</label>
							<input name="tgl_surat" type="date" class="form-control form-control-solid" />
						</div>
						<!--end::Input group-->
					</div>
					<div class="keluar" hidden>
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-7 fv-row">
							<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
								<span class="required">Tujuan</span>
							</label>
							<input name="tujuan" type="text" class="form-control form-control-solid" placeholder="Masukkan alamat surat..." />
						</div>
						<!--end::Input group-->
					</div>
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="fs-6 fw-semibold form-label mb-2">Keterangan</label>
						<textarea name="keterangan" rows="2" class="form-control form-control-solid" placeholder="Masukkan keterangan jika ada..."></textarea>
					</div>
					<!--end::Input group-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" id="kt_modal_new_nomor_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Kembali</button>
						<button type="submit" id="kt_modal_new_nomor_submit" class="btn btn-primary">
							<span class="indicator-label">Simpan</span>
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

@push('scripts')
<script>
	$('#jenis-dropdown-modal').on('change', function() {
		if ($(this).val() == 'keluar') {
			$('.masuk').attr('hidden', true);
			$('.keluar').removeAttr('hidden');
		} else {
			$('.keluar').attr('hidden', true);
			$('.masuk').removeAttr('hidden');
		}
	});
</script>
@endpush