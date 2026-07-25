<x-default-layout>
    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.pejabat.create') }}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Tambah Referensi Pejabat</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-8">
            <!--begin::Form-->
            <form class="form" action="{{ route('master.pejabat.store') }}" method="post">
                @csrf
                @method('POST')
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Jabatan</span>
                        </label>
                        <select name="jabatan" type="text" class="form-control form-control-solid" required>
                            <option value="" hidden>Pilih Jabatan...</option>
                            <option value="KPA">KPA</option>
                            <option value="PPK">PPK</option>
                            <option value="PPK2">PPK2</option>
                            <option value="BEND">BENDAHARA</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Pegawai</span>
                        </label>
                        <select name="pegawai_id" type="text" class="form-control form-control-solid" required>
                            <option value="" hidden>Pilih Pegawai...</option>
                            @foreach($pegawai as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Tanggal Menjabat</span>
                        </label>
                        <input name="tgl_mulai" type="date" class="form-control form-control-solid" placeholder="00/00/0000" required />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tanggal Selesai</span>
                        </label>
                        <input name="tgl_selesai" type="date" class="form-control form-control-solid" placeholder="00/00/0000" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nomor SK</span>
                        </label>
                        <input name="no_sk" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor SK..." />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tanggal SK</span>
                        </label>
                        <input name="tgl_sk" type="date" class="form-control form-control-solid" placeholder="00/00/0000" />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('master.pejabat.index') }}" class="btn btn-light me-3">Kembali</a>
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