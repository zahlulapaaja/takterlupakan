<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.sk.create') }}
    @endsection

    <!--begin::Form-->
    <form id="form_create_sk" method="post" action="{{ route('kegiatan.sk.store') }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('POST')
        <!--begin::Aside column-->
        <div class="w-100 flex-lg-row-auto w-lg-400px mb-7 me-7 me-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Detail SK</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <!--begin::Output-->
                            <label class="form-label bg-amber-300 mb-0 mt-2">Output</label>
                            <div class="fw-semibold fs-6">{{ $pok->kode_kegiatan . '.' . $pok->kode_output . ' : ' . $pok->output }}</div>
                            <input type="hidden" name="kode_kegiatan" value="{{$pok->kode_kegiatan}}" />
                            <input type="hidden" name="kode_output" value="{{$pok->kode_output}}" />
                            <!--end::Output-->
                            <!--begin::Sub Output-->
                            <label class="form-label bg-yellow-300 mb-0 mt-2">Sub Output</label>
                            <div class="fw-semibold fs-6">{{ $pok->kode_kegiatan . '.' . $pok->kode_output . '.' . $pok->kode_suboutput . ' : ' . $pok->suboutput }}</div>
                            <input type="hidden" name="kode_suboutput" value="{{$pok->kode_suboutput}}" />
                            <!--end::Sub Output-->
                            <!--begin::Komponen-->
                            <label class="form-label bg-lime-300 mb-0 mt-2">Komponen</label>
                            <div class="fw-semibold fs-6">{{ $pok->kode_komponen . ' : ' . $pok->komponen }}</div>
                            <input type="hidden" name="kode_komponen" value="{{$pok->kode_komponen}}" />
                            <!--end::Komponen-->
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->
            <!--begin::Order details-->
            <div class="card card-flush py-4 my-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Nomor SK</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">No SK</label>
                            <input type="text" class="form-control" placeholder="001/11070/VS.300/2025" name="no" required />
                            <div class="text-muted fs-7">Note : ambil nomor surat terlebih dahulu</div>
                            @error('no')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">SK Tentang</label>
                            <input type="text" class="form-control" placeholder="Kegiatan..." name="tentang" required />
                            @error('tentang')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tim Kerja</label>
                            <select class="form-select" name="tim" required>
                                <option value="" hidden>Pilih Tim...</option>
                                @foreach($tim as $t)
                                <option value="{{$t->id}}">{{$t->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->
            <!--begin::Order details-->
            <div class="card card-flush py-4 my-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Periode SK</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column flex-md-row gap-5">
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid">
                            <label class="required form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" placeholder="Select a date" class="form-control mb-2" required />
                            @error('tgl_mulai')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid">
                            <label class="required form-label">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" placeholder="Select a date" class="form-control mb-2" required />
                            @error('tgl_akhir')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="d-flex flex-column gap-5 mt-5">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tanggal Berlaku</label>
                            <input type="date" name="tgl_berlaku" placeholder="Select a date" class="form-control mb-2" required />
                            @error('tgl_berlaku')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tanggal Ditetapkan</label>
                            <input type="date" name="tgl_ditetapkan" placeholder="Select a date" class="form-control mb-2" required />
                            @error('tgl_ditetapkan')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->
        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Daftar Honor</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Repeater-->
                        <div id="daftar_honor">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div data-repeater-list="daftar_honor" class="d-flex flex-column gap-3">
                                    <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control w-2/5" name="uraian_honor" placeholder="Uraian" required />
                                        <input type="number" class="form-control w-2/5" name="honor" placeholder="Honor" required />
                                        <!--end::Input-->
                                        <button type="button" data-repeater-delete="" class="w-1/5 btn btn-sm btn-icon btn-light-danger">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group mt-5">
                                <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>Tambah</button>
                            </div>
                            <!--end::Form group-->
                        </div>
                        <!--end::Repeater-->
                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Order details-->

            <!--begin::Variations-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Daftar Petugas</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                        <!--begin::Label-->
                        <label class="form-label">Petugas</label>
                        <!--end::Label-->
                        <!--begin::Repeater-->
                        <div id="daftar_petugas">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div data-repeater-list="daftar_petugas" class="d-flex flex-column gap-3">
                                    <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                        <!--begin::Select2-->
                                        <div class="w-2/5">
                                            <input name="petugas" class="form-select" list="petugas" placeholder="Pilih..." required>
                                            <datalist id="petugas" required>
                                                @foreach($list_petugas as $p)
                                                <option value="{{$p->list}}">
                                                    @endforeach
                                            </datalist>
                                        </div>
                                        <!--end::Select2-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control w-2/5" name="sebagai" placeholder="Sebagai" required />
                                        <!--end::Input-->
                                        <button type="button" data-repeater-delete="" class="w-1/5 btn btn-sm btn-icon btn-light-danger">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group mt-5">
                                <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>Tambah petugas</button>
                            </div>
                            <!--end::Form group-->
                        </div>
                        <!--end::Repeater-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Variations-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('pok.index') }}" id="form_create_sk_cancel" class="btn btn-light me-5">Kembali</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="form_create_sk_submit" class="btn btn-primary">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Main column-->
    </form>
    <!--end::Form-->

    @push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#daftar_honor').repeater();
            $('#daftar_petugas').repeater();
        });
    </script>
    @endpush
</x-default-layout>