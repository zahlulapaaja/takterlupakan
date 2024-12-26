<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.mitra.edit', $data->id) }}
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
                    <h2>Edit Data Mitra</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form id="edit_mitra_form" class="form" method="post" action="{{route('master.mitra.update', $data->id)}}">
                    @csrf
                    @method('PUT')
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Nama</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="nama" value="{{$data->nama}}" />
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
                        <input type="text" class="form-control form-control-solid" name="posisi" value="{{$data->posisi}}" />
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
                                <input type="text" class="form-control form-control-solid" name="id_sobat" value="{{$data->id_sobat}}" />
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
                                <input type="email" class="form-control form-control-solid" name="email" value="{{$data->email}}" />
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
                                <input type="text" class="form-control form-control-solid" name="alamat_detail" value="{{$data->alamat_detail}}" />
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
                                <input type="text" class="form-control form-control-solid" name="alamat_prov" value="{{$data->alamat_prov}}" />
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
                                <input type="text" class="form-control form-control-solid" name="alamat_kab" value="{{$data->alamat_kab}}" />
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
                                <input type="text" class="form-control form-control-solid" name="alamat_kec" value="{{$data->alamat_kec}}" />
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
                                <input type="text" class="form-control form-control-solid" name="alamat_desa" value="{{$data->alamat_desa}}" />
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
                                    <span class="required">Tanggal Lahir</span>
                                </label>
                                <input type="date" class="form-control form-control-solid" name="tgl_lahir" value="{{$data->tgl_lahir}}" />
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
                                    <select id="select-jk" class="form-select form-select-solid" name="jk">
                                        <option value="{{$data->jk}}" selected hidden>{{$data->jk_desc}}</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
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
                                    <span class="required">Agama</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-agama" class="form-select form-select-solid" name="agama">
                                        <option value="{{$data->agama}}" selected hidden>{{$data->agama_desc}}</option>
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
                                    <span class="required">Status</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-status" class="form-select form-select-solid" name="status">
                                        <option value="{{$data->status}}" selected hidden>{{$data->status_desc}}</option>
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
                                    <span class="required">Pendidikan</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" name="pendidikan" value="{{$data->pendidikan}}" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Pekerjaan</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" name="pekerjaan" value="{{$data->pekerjaan}}" />
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
                                    <span class="required">No Telp</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="no_telp" value="{{$data->no_telp}}" />
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
                                <input type="text" class="form-control form-control-solid" name="npwp" value="{{$data->npwp}}" />
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
                                    <span>Bank</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-bank" class="form-select form-select-solid" name="nama_bank">
                                        <option value="{{$data->nama_bank}}" selected hidden>{{$data->nama_bank}}</option>
                                        <option value="BSI">BSI</option>
                                        <option value="Bank Aceh">Bank Aceh</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BNI">BNI</option>
                                        <option value="Bank Muamalat">Bank Muamalat</option>
                                        <option value="Bank BCA Syariah">Bank BCA Syariah</option>
                                        <option value="Bank BTN Syariah">Bank BTN Syariah</option>
                                        <option value="Bank Lainnya">Bank Lainnya</option>
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
                                    <span>Nomor Rekening</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="no_rek" value="{{$data->no_rek}}" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Nama Pemilik Rekening</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="an_rek" value="{{$data->an_rek}}" />
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
                        <textarea class="form-control form-control-solid" name="catatan">{{$data->catatan}}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('master.mitra.list', $data->tahun)}}" class="btn btn-light me-3">Kembali</a>
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