<x-default-layout>
    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.referensi.create') }}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Tambah Referensi Tahun {{$last_tahun}}</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-8">
            <!--begin::Form-->
            <form class="form" action="{{ route('master.referensi.store') }}" method="post">
                @csrf
                @method('POST')
                <input name="tahun" type="hidden" value="{{$last_tahun}}" />
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">KPA (Kuasa Pengguna Anggaran)</span>
                        </label>
                        <select name="kpa" type="text" class="form-control form-control-solid" required>
                            <option value="" hidden>Pilih KPA...</option>
                            @foreach($pegawai as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Bendahara</span>
                        </label>
                        <select name="bend" type="text" class="form-control form-control-solid" required>
                            <option value="" hidden>Pilih Bendahara...</option>
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
                            <span class="required">PPK</span>
                        </label>
                        <select name="ppk" type="text" class="form-control form-control-solid" required>
                            <option value="" hidden>Pilih PPK...</option>
                            @foreach($pegawai as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label">
                            <span class="required">PPK 2</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="PPK 2 hanya muncul pilihan saat membuat KAK.">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <select name="ppk2" type="text" class="form-control form-control-solid" required>
                            <option value="" hidden>Pilih PPK 2...</option>
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
                    <div class="d-flex flex-column w-full">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nomor PMK {{$last_tahun}}</span>
                        </label>
                        <textarea name="pmk" class="form-control form-control-solid" rows="3" placeholder="Peraturan Menteri Keuangan tentang Standar Biaya Masukan Tahun Anggaran {{$last_tahun}}..." required></textarea>
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