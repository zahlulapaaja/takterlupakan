<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.spj.create') }}
    @endsection

    <!--begin::Form-->
    <form id="form_create_spj" method="post" action="{{ route('kegiatan.spj.store') }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('POST')
        <!--begin::Aside column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">

            <div class="d-flex flex-column flex-lg-row gap-7 gap-lg-10">
                <!--begin::MAK-->
                <div class="card card-flush py-4 w-full">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Detail Kegiatan</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-10">
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <input type="hidden" name="kegiatans_id" value="{{$keg->id}}" />
                                <input type="hidden" name="akun" value="{{$keg->pok->kode_akun}}" />
                                <input type="hidden" name="tahun" value="{{$keg->pok->tahun}}" />
                                <!--begin::MAK-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5">
                                    <label class="w-32 font-semibold fs-6 text-nowrap">MAK</label>
                                    <div class="fw-semibold fs-6 ms-4 me-auto bg-cyan-300">{{ $keg->mak }}</div>
                                </div>
                                <!--end::MAK-->
                                <!--begin::Nama Kegiatan-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5">
                                    <label class="w-32 font-semibold fs-6 text-nowrap">Nama Kegiatan</label>
                                    <div class="fw-semibold fs-6 pl-4">{{ $keg->nama }}</div>
                                </div>
                                <!--end::Nama Kegiatan-->
                                <!--begin::Jadwal Kegiatan-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5">
                                    <label class="text-nowrap w-32 font-semibold fs-6 text-nowrap">Jadwal Kegiatan</label>
                                    <div class="fw-semibold fs-6 pl-4">{{date_indo($keg->tgl_mulai)}} s.d. {{date_indo($keg->tgl_akhir)}}</div>
                                </div>
                                <!--end::Jadwal Kegiatan-->
                                <!--begin::PJK-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5">
                                    <label class="w-32 font-semibold fs-6 text-nowrap">PJK</label>
                                    <div class="fw-semibold fs-6 pl-4">{{$keg->pjk->nama}}</div>
                                </div>
                                <!--end::PJK-->
                                <!--begin::Detil Kegiatan-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5">
                                    <label class="w-32 font-semibold fs-6 text-nowrap">Detil Kegiatan</label>
                                    <div class="fw-semibold fs-6 pl-4">{{ $keg->pok->item_kegiatan }}</div>
                                </div>
                                <!--end::Detil Kegiatan-->
                                <!--begin::Anggaran-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5">
                                    <label class="w-32 font-semibold fs-6 text-nowrap">Anggaran</label>
                                    <div class="fw-semibold fs-6 pl-4 d-flex flex-column flex-lg-row">
                                        <span class="mr-8">[Volume : {{ $keg->pok->volume }}]</span>
                                        <span class="mr-8">[Satuan : {{ $keg->pok->satuan }}]</span>
                                        <span>[Jumlah : {{ $keg->pok->jumlah }}]</span>
                                    </div>
                                </div>
                                <!--end::Anggaran-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::MAK-->

                <!--begin::No SPJ details-->
                <div class="card card-flush py-4 w-full">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Tanggal SPJ</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5">
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <label class="required form-label">Tanggal Input SPJ</label>
                                <input type="date" class="form-control" name="tgl" required />
                            </div>
                            <!--end::Input group-->

                            @if($keg->pok->kode_akun == config('constants.AKUN_TRANSLOK'))
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <!--begin::Input group-->
                                <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                    <label class="required form-label">Nomor Surat Tugas</label>
                                    <input name="no_st" type="text" list="nomot_st" class="form-control mb-2" placeholder="Masukkan Nomor Surat..." required />
                                    <!-- <div class="text-muted fs-7">Buat surat tugas di menu Nomor Surat - Tim Kerja</div> -->
                                    <datalist id="nomot_st">
                                        @foreach($nomor_st as $n)
                                        <option value="{{$n->no_surat}}">{{$n->no_surat}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                    <label class="required form-label">Tanggal Surat Tugas</label>
                                    <input type="date" name="tgl_st" class="form-control mb-2" required />
                                </div>
                                <!--end::Input group-->
                            </div>
                            @endif

                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::No SPJ details-->
            </div>

            <!--begin::Petugas-->
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

                    @if($keg->pok->kode_akun == config('constants.AKUN_HONOR'))
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <label class="required form-label">No SK</label>
                        <select id="no-sk-dropdown" class="form-select" name="tim" required>
                            <option value="" hidden>Pilih No SK...</option>
                            @foreach($sk as $s)
                            <option value="{{$s->id}}">{{$s->no}} - {{$s->tentang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div id="daftar-petugas-honor" class="my-4">
                    </div>
                    @error('checkbox')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <!--end::Input group-->

                    @elseif($keg->pok->kode_akun == config('constants.AKUN_TRANSLOK'))
                    <!--begin::Input group-->
                    <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                        <!--begin::Label-->
                        <label class="form-label">Petugas</label>
                        <!--end::Label-->
                        <!--begin::Repeater-->
                        <div id="daftar_petugas_translok">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div data-repeater-list="daftar_petugas_translok" class="d-flex flex-column gap-3">
                                    <div data-repeater-item="" class="form-group d-flex flex-column flex-lg-row gap-3">
                                        <!--begin::Select2-->
                                        <div class="w-full w-lg-1/6">
                                            <input name="petugas" class="form-select" list="petugas" placeholder="Pilih..." required>
                                            <datalist id="petugas">
                                                @foreach($list_petugas as $p)
                                                <option value="{{$p->list}}">
                                                    @endforeach
                                            </datalist>
                                        </div>
                                        <!--end::Select2-->
                                        <!--begin::Input-->
                                        <span class="d-flex flex-row w-full w-lg-1/6 gap-2">
                                            <input type="number" class="form-control" name="byk_kunj" placeholder="Byk Kunj..." required />
                                            <span class="text-left text-lg my-auto text-nowrap mx-1">{{$keg->pok->satuan}}</span>
                                        </span>
                                        <input type="text" class="form-control w-full w-lg-1/6" name="melakukan" placeholder="Melakukan" required />
                                        <input type="text" class="form-control w-full w-lg-1/6" name="lokasi" placeholder="Lokasi" required />
                                        <input type="text" class="form-control w-full w-lg-1/6" name="tgl_kunj" placeholder="Tgl Kunj" required />
                                        <span class="d-flex flex-row w-full w-lg-1/6 gap-2">
                                            <input type="number" class="form-control" name="nominal" placeholder="Realisasi" required />
                                            <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger my-auto">
                                                <i class="ki-duotone ki-cross fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </button>
                                        </span>
                                        <!--end::Input-->
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
                    @endif
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Petugas-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('kegiatan.index') }}" id="form_create_spj_cancel" class="btn btn-light me-5">Kembali</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="form_create_spj_submit" class="btn btn-primary">
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

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#daftar_petugas_translok').repeater();

            // No SK Dropdown Change Event
            $('#no-sk-dropdown').on('change', function() {
                var id_sk = this.value;
                $("#daftar-petugas-honor").html('');

                $.ajax({
                    url: "{{url('api/fetch-beban-spj')}}",
                    type: "POST",
                    data: {
                        id_sk: id_sk,
                        akun: '{{$keg->pok->kode_akun}}',
                        satuan: '{{$keg->pok->satuan}}',
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#daftar-petugas-honor').html(result.view);
                    }

                });

            });

        });
    </script>
    @endpush
</x-default-layout>