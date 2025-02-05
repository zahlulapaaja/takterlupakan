<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.mitra.add', $tahun) }}
    @endsection

    <div class="row g-7">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <i class="ki-duotone ki-badge fs-1 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                    <h2>Tambah Mitra</h2>
                </div>
                <!--end::Card title-->
                <div class="card-toolbar">
                    <div class="card-title mt-3">
                        <h2>{{$tahun}}</h2>
                    </div>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form id="add_mitra_form" class="form" method="post" action="{{route('master.mitra.store')}}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="tahun" value="{{$tahun}}" />
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Nama</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="nama" value="{{old('nama')}}" placeholder="Masukkan nama..." required />
                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Posisi</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Mitra Pendataan atau Mitra Pengolahan.">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="posisi" value="{{old('posisi')}}" placeholder="Mitra Pendataan" required />
                        @error('posisi')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">ID Sobat</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="id_sobat" value="{{old('id_sobat')}}" placeholder="1107..." required />
                                @error('id_sobat')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Email</span>
                                </label>
                                <input type="email" class="form-control form-control-solid" name="email" value="{{old('email')}}" placeholder="Masukkan email..." required />
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-1 rol-cols-md-1 row-cols-lg-1">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Alamat</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="alamat_detail" value="{{old('alamat_detail')}}" placeholder="Masukkan alamat..." required />
                                @error('alamat_detail')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-4 row-cols-lg-4">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Prov</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="alamat_prov" value="11" required />
                                @error('alamat_prov')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Kab</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="alamat_kab" value="07" required />
                                @error('alamat_kab')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Kec</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="alamat_kec" value="050" required />
                                @error('alamat_kec')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Desa</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="alamat_desa" value="011" required />
                                @error('alamat_desa')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Tanggal Lahir</span>
                                </label>
                                <input type="date" class="form-control form-control-solid" name="tgl_lahir" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Jenis Kelamin</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-jk" class="form-select form-select-solid" name="jk" required>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    @error('jk')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <!--end::Select2-->
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Agama</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-agama" class="form-select form-select-solid" name="agama">
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Katolik</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Buddha</option>
                                        <option value="6">Khonghucu</option>
                                        <option value="7">Lainnya</option>
                                    </select>
                                    <!--end::Select2-->
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Status</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-status" class="form-select form-select-solid" name="status">
                                        <option value="1">Belum Kawin</option>
                                        <option value="2">Kawin</option>
                                        <option value="3">Cerai Hidup</option>
                                        <option value="4">Cerai Mati</option>
                                    </select>
                                    <!--end::Select2-->
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Pendidikan</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" name="pendidikan" value="5" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Pekerjaan</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" name="pekerjaan" value="5" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>No Telp</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="no_telp" placeholder="+628 ... ..." />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>NPWP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder="Masukkan NPWP..." name="npwp" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Bank</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-bank" class="form-select form-select-solid" name="nama_bank" required>
                                        <option value="BSI">BSI</option>
                                        <option value="Bank Aceh">Bank Aceh</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BNI">BNI</option>
                                        <option value="Bank Muamalat">Bank Muamalat</option>
                                        <option value="Bank BCA Syariah">Bank BCA Syariah</option>
                                        <option value="Bank BTN Syariah">Bank BTN Syariah</option>
                                        <option value="Bank Lainnya">Bank Lainnya</option>
                                    </select>
                                    @error('nama_bank')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <!--end::Select2-->
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Nomor Rekening</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="no_rek" value="{{old('no_rek')}}" placeholder="123XXXXXX" />
                                @error('no_rek')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Nama Pemilik Rekening</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="an_rek" value="{{old('an_rek')}}" placeholder="atas nama..." />
                                @error('an_rek')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Notes</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan catatan tambahan (optional).">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid" name="catatan">{{old('catatan')}}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('master.mitra.list', $tahun)}}" class="btn btn-light me-3">Kembali</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Contacts-->
    </div>

    @push('scripts')
    <script src="'{{asset('assets/js/custom/apps/contacts/edit-contact.js')}}'"></script>
    @endpush
</x-default-layout>