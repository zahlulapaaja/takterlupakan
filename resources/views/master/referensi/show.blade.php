<x-default-layout>

    @section('title')
    Master
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Edit Referensi Tahun {{$data->tahun}}</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('master.referensi.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <input name="tahun" type="hidden" value="{{$data->tahun}}" />
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nama KPA</span>
                        </label>
                        <input name="nama_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama KPA..." value="{{$data->nama_kpa}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>NIP KPA</span>
                        </label>
                        <input name="nip_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP KPA..." value="{{$data->nip_kpa}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nama PPK</span>
                        </label>
                        <input name="nama_ppk" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama PPK..." value="{{$data->nama_ppk}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>NIP PPK</span>
                        </label>
                        <input name="nip_ppk" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP PPK..." value="{{$data->nip_ppk}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nama Bendahara</span>
                        </label>
                        <input name="nama_bend" type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Bendahara..." value="{{$data->nama_bend}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>NIP Bendahara</span>
                        </label>
                        <input name="nip_bend" type="text" class="form-control form-control-solid" placeholder="Masukkan NIP Bendahara..." value="{{$data->nip_bend}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nomor DIPA</span>
                        </label>
                        <input name="no_dipa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor DIPA..." value="{{$data->no_dipa}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tanggal DIPA</span>
                        </label>
                        <input name="tgl_dipa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" value="{{$data->tgl_dipa}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Nomor SK KPA</span>
                        </label>
                        <input name="no_sk_kpa" type="text" class="form-control form-control-solid" placeholder="Masukkan Nomor SK KPA..." value="{{$data->no_sk_kpa}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Tanggal SK KPA</span>
                        </label>
                        <input name="tgl_sk_kpa" type="date" class="form-control form-control-solid" placeholder="00/00/0000" value="{{$data->tgl_sk_kpa}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Jalan</span>
                        </label>
                        <input name="jln" type="text" class="form-control form-control-solid" placeholder="Jl. Sisingamangaraja No. 2..." value="{{$data->jln}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Kabupaten</span>
                        </label>
                        <input name="kab" type="text" class="form-control form-control-solid" placeholder="Kabupaten Aceh Barat..." value="{{$data->kab}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Kodepos</span>
                        </label>
                        <input name="kodepos" type="text" class="form-control form-control-solid" placeholder="23617" value="{{$data->kodepos}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Telp/Faks</span>
                        </label>
                        <input name="tlp" type="text" class="form-control form-control-solid" placeholder="(62-655) 7553330" value="{{$data->tlp}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-row mb-7 fv-row">
                    <div class="d-flex flex-column w-1/2 mr-7">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Email</span>
                        </label>
                        <input name="email" type="text" class="form-control form-control-solid" placeholder="bps1107@bps.go.id" value="{{$data->email}}" disabled />
                    </div>
                    <div class="d-flex flex-column w-1/2 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span>Website</span>
                        </label>
                        <input name="web" type="text" class="form-control form-control-solid" placeholder="acehbaratkab.bps.go.id" value="{{$data->web}}" disabled />
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('master.referensi.index') }}" class="btn btn-light me-3">Kembali</a>
                    <a href="{{ route('master.referensi.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 9-->
</x-default-layout>