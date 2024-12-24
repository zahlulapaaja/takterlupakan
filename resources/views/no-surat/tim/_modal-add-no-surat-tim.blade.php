<!--begin::Modal - New Card-->
<div class="modal fade" id="add_no_surat_tim" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2>Tambah Nomor Surat Tim Kerja</h2>
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
				<form id="modal_add_no_surat_tim_form" class="form" action="{{ route('no-surat.tim.store') }}" method="post">
					@csrf
					@method('POST')
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Tahun</span>
						</label>
						<select id="tahun-dropdown-modal" name="tahun" class="form-control form-control-solid">
							<option value="" hidden>Pilih Tahun...</option>
							@foreach($list_tahun as $thn)
							<option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
							@endforeach
						</select>
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Tim</span>
						</label>
						<select id="tim-dropdown-modal" name="tim" class="form-control form-control-solid">
						</select>
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
							<span class="required">Jenis</span>
						</label>
						<input name="jenis" type="text" list="jenis_nomor" class="form-control form-control-solid" placeholder="Masukkan Jenis Surat..." />
						<datalist id="jenis_nomor">
							<option value="ST">ST</option>
							<option value="SPJ">SPJ</option>
							<option value="BAST">BAST</option>
							<option value="SK">SK</option>
						</datalist>
					</div>
					<!--end::Input group-->
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
						<label class="required fs-6 fw-semibold form-label mb-2">Rincian</label>
						<input name="rincian" type="text" class="form-control form-control-solid" placeholder="Masukkan rincian..." />
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="d-flex flex-column mb-7 fv-row">
						<label class="required fs-6 fw-semibold form-label mb-2">Tanggal</label>
						<input name="tgl" type="date" class="form-control form-control-solid" />
					</div>
					<!--end::Input group-->
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
	// Tahun Dropdown Change Event
	$('#tahun-dropdown-modal').on('change', function() {
		var tahun = this.value;
		$("#tim-dropdown-modal").html('');

		$.ajax({
			url: "{{url('api/fetch-tim')}}",
			type: "POST",
			data: {
				tahun: tahun,
				_token: '{{csrf_token()}}'
			},
			dataType: 'json',
			success: function(res) {
				$('#tim-dropdown-modal').html('<option value="" hidden>Pilih Tim Kerja...</option>');

				$.each(res.tim, function(key, value) {
					console.log(value.singkatan);
					$("#tim-dropdown-modal").append('<option value="' +
						value.id + '">' + value.singkatan + ' - ' + value.kode + '</option>');
				});
			}

		});

	});
</script>
@endpush