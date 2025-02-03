<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.edit', $data->id) }}
    @endsection

    <!--begin::Form-->
    <form id="form_edit_kegiatan" method="post" action="{{ route('kegiatan.update', $data->id) }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('PUT')
        <!--begin::Aside column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Detail POK</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <input type="hidden" name="poks_id" value="{{$pok->id}}" />
                            <input type="hidden" name="tahun" value="{{$pok->tahun}}" />
                            <!--begin::Output-->
                            <div class="d-flex flex-column flex-lg-row py-auto">
                                <label class="w-32 font-semibold fs-6"><span class="bg-amber-300">Output</span></label>
                                <div class="fw-semibold fs-6">[{{ $pok->kode_kegiatan . '.' . $pok->kode_output}}] {{ $pok->output }}</div>
                            </div>
                            <!--end::Output-->
                            <!--begin::Sub Output-->
                            <div class="d-flex flex-column flex-lg-row py-auto">
                                <label class="w-32 font-semibold fs-6"><span class="bg-yellow-300">Sub Output</span></label>
                                <div class="fw-semibold fs-6">[{{ $pok->kode_kegiatan . '.' . $pok->kode_output . '.' . $pok->kode_suboutput}}] {{$pok->suboutput }}</div>
                            </div>
                            <!--end::Sub Output-->
                            <!--begin::Komponen-->
                            <div class="d-flex flex-column flex-lg-row py-auto">
                                <label class="w-32 font-semibold fs-6"><span class="bg-lime-300">Komponen</span></label>
                                <div class="fw-semibold fs-6">[{{ $pok->kode_komponen }}] {{ $pok->komponen }}</div>
                            </div>
                            <!--end::Komponen-->
                            <!--begin::Akun-->
                            <div class="d-flex flex-column flex-lg-row py-auto">
                                <label class="w-32 font-semibold fs-6"><span class="bg-cyan-300">Akun</span></label>
                                <div class="fw-semibold fs-6">[{{ $pok->kode_akun }}] {{ $pok->akun }}</div>
                            </div>
                            <!--end::Akun-->
                            <!--begin::Detil Kegiatan-->
                            <div class="d-flex flex-column flex-lg-row py-auto">
                                <label class="w-32 font-semibold fs-6">Detil Kegiatan</label>
                                <div class="fw-semibold fs-6">{{ $pok->item_kegiatan }}</div>
                            </div>
                            <!--end::Detil Kegiatan-->
                            <!--begin::Anggaran-->
                            <div class="d-flex flex-column flex-lg-row py-auto">
                                <label class="w-32 font-semibold fs-6">Anggaran</label>
                                <div class="fw-semibold fs-6 d-flex flex-column flex-lg-row">
                                    <span class="mr-8">[Volume : {{ $pok->volume }}]</span>
                                    <span class="mr-8">[Satuan : {{ $pok->satuan }}]</span>
                                    <span>[Jumlah : {{ $pok->jumlah }}]</span>
                                </div>
                            </div>
                            <!--end::Anggaran-->
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->

            <!--begin::Kegiatan details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Detail Kegiatan</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-5">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Nama Kegiatan</label>
                            <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama Kegiatan..." value="{{$data->nama}}" required />
                        </div>
                        <!--end::Input group-->
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <!--begin::Input group-->
                            <div class="fv-row flex-row-fluid">
                                <label class="required form-label">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" class="form-control mb-2" value="{{$data->tgl_mulai}}" required />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row flex-row-fluid">
                                <label class="required form-label">Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" class="form-control mb-2" value="{{$data->tgl_akhir}}" required />
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <!--begin::Input group-->
                            <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                <label class="required form-label">Tim Kerja</label>
                                <select class="form-select" name="tim" required>
                                    <option value="{{$data->tim->id}}" hidden>{{$data->tim->nama}}</option>
                                    @foreach($tim as $t)
                                    <option value="{{$t->id}}">{{$t->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                <label class="required form-label">PJK</label>
                                <select class="form-select" name="pjk" required>
                                    <option value="{{$data->pjk->id}}" hidden>{{$data->pjk->nama}}</option>
                                    @foreach($pegawai as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Kegiatan details-->

            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('kegiatan.index') }}" id="form_edit_kegiatan_cancel" class="btn btn-light me-5">Kembali</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="form_edit_kegiatan_submit" class="btn btn-primary">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Aside column-->

    </form>
    <!--end::Form-->

</x-default-layout>