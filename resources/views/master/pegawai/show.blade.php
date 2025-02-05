<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.pegawai.show', $data->id) }}
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
                    <h2>Detail Data Pegawai</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form id="tambah_pegawai_form" class="form" method="post" action="{{route('master.pegawai.update', $data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::Input group-->
                    <div class="mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-3">
                            <span>Update Avatar</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image input wrapper-->
                        <div class="mt-1">
                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{asset("assets/media/svg/files/blank-image.svg")}}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{asset("assets/media/svg/files/blank-image-dark.svg")}}');
                                }
                            </style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <?php $url = asset('uploads/' . $data->avatar); ?>
                                <div class="image-input-wrapper w-100px h-100px" style="background-image: url('{{$url}}')"></div>
                                <!--end::Preview existing avatar-->
                            </div>
                            <!--end::Image input-->
                        </div>
                        <!--end::Image input wrapper-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Nama</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="nama" value="{{$data->nama}}" disabled />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Jabatan</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="jabatan" value="{{$data->jabatan}}" disabled />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Row-->
                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>NIP Baru</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="nip_baru" value="{{$data->nip_baru}}" disabled />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>NIP Lama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="nip_lama" value="{{$data->nip_lama}}" disabled />
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
                                    <span>Golongan</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-golongan" class="form-select form-select-solid" name="golongan" disabled>
                                        <option value="{{$data->golongan}}" selected hidden>{{$data->golongan}}</option>
                                        <option value="I/a">I/a</option>
                                        <option value="I/b">I/b</option>
                                        <option value="I/c">I/c</option>
                                        <option value="I/d">I/d</option>
                                        <option value="II/a">II/a</option>
                                        <option value="II/b">II/b</option>
                                        <option value="II/c">II/c</option>
                                        <option value="II/d">II/d</option>
                                        <option value="III/a">III/a</option>
                                        <option value="III/b">III/b</option>
                                        <option value="III/c">III/c</option>
                                        <option value="III/d">III/d</option>
                                        <option value="IV/a">IV/a</option>
                                        <option value="IV/b">IV/b</option>
                                        <option value="IV/c">IV/c</option>
                                        <option value="IV/d">IV/d</option>
                                        <option value="IV/e">IV/e</option>
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
                                    <span>Pangkat</span>
                                </label>
                                <div class="w-100">
                                    <!--begin::Select2-->
                                    <select id="select-pangkat" class="form-select form-select-solid" name="pangkat" disabled>
                                        <option value="{{$data->pangkat}}" selected hidden>{{$data->pangkat}}</option>
                                        <option value="Juru Muda">Juru Muda</option>
                                        <option value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
                                        <option value="Juru">Juru</option>
                                        <option value="Juru Tingkat 1">Juru Tingkat 1</option>
                                        <option value="Pengatur Muda">Pengatur Muda</option>
                                        <option value="Pengatur Muda Tingkat I">Pengatur Muda Tingkat I</option>
                                        <option value="Pengatur">Pengatur</option>
                                        <option value="Pengatur Tingkat I">Pengatur Tingkat I</option>
                                        <option value="Penata Muda">Penata Muda</option>
                                        <option value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
                                        <option value="Penata">Penata</option>
                                        <option value="Penata Tingkat I">Penata Tingkat I</option>
                                        <option value="Pembina">Pembina</option>
                                        <option value="Pembina Tingkat I">Pembina Tingkat I</option>
                                        <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                                        <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                                        <option value="Pembina Utama">Pembina Utama</option>
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
                                    <span>Email</span>
                                </label>
                                <input type="email" class="form-control form-control-solid" name="email" value="{{$data->email}}" disabled />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>No HP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="no_hp" value="{{$data->no_hp}}" disabled />
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
                                    <select id="select-bank" class="form-select form-select-solid" name="nama_bank" disabled>
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
                                <input type="text" class="form-control form-control-solid" name="no_rek" value="{{$data->no_rek}}" disabled />
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
                                <input type="text" class="form-control form-control-solid" name="an_rek" value="{{$data->an_rek}}" disabled />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span>Notes</span>
                        </label>
                        <textarea class="form-control form-control-solid" name="catatan" disabled>{{$data->catatan}}</textarea>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Separator-->
                    <div class="separator mb-6"></div>
                    <!--end::Separator-->
                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('master.pegawai.index')}}" class="btn btn-light me-3">Kembali</a>
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