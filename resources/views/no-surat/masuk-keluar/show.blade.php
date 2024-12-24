<x-default-layout>

    @section('title')
    Detail Nomor Surat
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Detail Nomor Surat Masuk Keluar</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('no-surat.masuk-keluar.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')

                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tahun</span>
                            </label>
                            <input name="tahun" type="number" class="form-control form-control-solid" value="{{ $data->tahun }}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Jenis</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" value="{{ $data->jenis }}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!-- end::Row -->

                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Nomor</span>
                            </label>
                            <input name="no" type="text" class="form-control form-control-solid" placeholder="001" value="{{ $data->no }}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal</span>
                            </label>
                            <input name="tgl" type="date" class="form-control form-control-solid" value="{{ $data->tgl }}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!-- end::Row -->

                @if($data->jenis == 'masuk')
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="fs-6 fw-semibold form-label mb-2">Pengirim</label>
                    <input name="pengirim" type="text" class="form-control form-control-solid" value="{{ $data->detail->pengirim }}" disabled />
                </div>
                <!--end::Input group-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Nomor Surat</span>
                            </label>
                            <input name="no_masuk" type="text" class="form-control form-control-solid" placeholder="Masukkan nomor surat masuk..." value="{{ $data->detail->no_masuk }}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Surat</span>
                            </label>
                            <input name="tgl_surat" type="date" class="form-control form-control-solid" value="{{ $data->detail->tgl_surat }}" disabled />
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!-- end::Row -->

                @else
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="fs-6 fw-semibold form-label mb-2">Tujuan</label>
                    <input name="tujuan" type="text" class="form-control form-control-solid" placeholder="Masukkan tujuan..." value="{{ $data->detail->tujuan }}" disabled />
                </div>
                <!--end::Input group-->
                @endif

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="fs-6 fw-semibold form-label mb-2">Rincian</label>
                    <input name="rincian" type="text" class="form-control form-control-solid" placeholder="Masukkan rincian..." value="{{ $data->detail->rincian }}" disabled />
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="fs-6 fw-semibold form-label mb-2">Keterangan</label>
                    <textarea name="keterangan" rows="2" class="form-control form-control-solid" placeholder="Masukkan keterangan jika ada..." disabled>{{$data->detail->keterangan}}</textarea>

                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-right pt-15">
                    <a href="{{ route('no-surat.masuk-keluar.index') }}" class="btn btn-light me-3">Kembali</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 9-->

</x-default-layout>