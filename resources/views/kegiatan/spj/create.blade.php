<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.spj.create') }}
    @endsection

    @push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <!--begin::Form-->
    <form id="form_create_spj" method="post" action="{{ route('kegiatan.spj.store') }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('POST')
        <!--begin::Aside column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
            <!--begin::Order details-->
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
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <input type="hidden" name="kegiatans_id" value="{{$keg->id}}" />
                            <input type="hidden" name="akun" value="{{$keg->pok->kode_akun}}" />
                            <input type="hidden" name="tahun" value="{{$keg->pok->tahun}}" />
                            <!--begin::MAK-->
                            <div class="d-flex flex-column flex-lg-row py-auto gap-5">
                                <label class="w-32 font-semibold fs-6">MAK</label>
                                <div class="fw-semibold fs-6 bg-cyan-300">{{ $keg->mak }}</div>
                            </div>
                            <!--end::MAK-->
                            <!--begin::Nama Kegiatan-->
                            <div class="d-flex flex-column flex-lg-row py-auto gap-5">
                                <label class="w-32 font-semibold fs-6">Nama Kegiatan</label>
                                <div class="fw-semibold fs-6">{{ $keg->nama }}</div>
                            </div>
                            <!--end::Nama Kegiatan-->
                            <!--begin::Jadwal Kegiatan-->
                            <div class="d-flex flex-column flex-lg-row py-auto gap-5">
                                <label class="text-nowrap w-32 font-semibold fs-6">Jadwal Kegiatan</label>
                                <div class="fw-semibold fs-6">{{$keg->tgl_mulai}} s.d. {{$keg->tgl_akhir}}</div>
                            </div>
                            <!--end::Jadwal Kegiatan-->
                            <!--begin::PJK-->
                            <div class="d-flex flex-column flex-lg-row py-auto gap-5">
                                <label class="w-32 font-semibold fs-6">PJK</label>
                                <div class="fw-semibold fs-6">{{$keg->pjk->nama}}</div>
                            </div>
                            <!--end::PJK-->
                            <!--begin::Detil Kegiatan-->
                            <div class="d-flex flex-column flex-lg-row py-auto gap-5">
                                <label class="w-32 font-semibold fs-6">Detil Kegiatan</label>
                                <div class="fw-semibold fs-6">{{ $keg->pok->item_kegiatan }}</div>
                            </div>
                            <!--end::Detil Kegiatan-->
                            <!--begin::Anggaran-->
                            <div class="d-flex flex-column flex-lg-row py-auto gap-5">
                                <label class="w-32 font-semibold fs-6">Anggaran</label>
                                <div class="fw-semibold fs-6 d-flex flex-column flex-lg-row">
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
            <!--end::Order details-->

            <div class="card card-flush py-4">
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
                            <label class="required form-label">Input SPJ</label>
                            <input type="date" class="form-control" name="tgl" required />
                        </div>
                        <!--end::Input group-->

                        @if($keg->pok->kode_akun == config('constants.AKUN_TRANSLOK'))
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <!--begin::Input group-->
                            <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                <label class="form-label">Nomor Surat Tugas</label>
                                <input type="text" name="no_st" class="form-control mb-2" placeholder="001/XX/XXXX/XXXX" />
                                <div class="text-muted fs-7">Nomor surat tugas dari BOS</div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                <label class="form-label">Tanggal Surat Tugas</label>
                                <input type="date" name="tgl_st" class="form-control mb-2" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        @endif

                    </div>
                </div>
                <!--end::Card header-->
            </div>
            <!--end::No SPJ details-->

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
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <label class="required form-label">No SK</label>
                        <select id="no-sk-dropdown" class="form-select" name="tim" required>
                            <option value="" hidden>Pilih No SK...</option>
                            @foreach($sk as $s)
                            <option value="{{$s->id}}">{{$s->no . '/SK/BPS-1107/' . $s->tahun}} - {{$s->tentang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div id="daftar-petugas" class="my-4">
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Petugas-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('pok.index') }}" id="form_create_spj_cancel" class="btn btn-light me-5">Kembali</a>
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

            // No SK Dropdown Change Event
            $('#no-sk-dropdown').on('change', function() {
                var id_sk = this.value;
                $("#daftar-petugas").html('');

                $.ajax({
                    url: "{{url('api/fetch-beban')}}",
                    type: "POST",
                    data: {
                        id_sk: id_sk,
                        akun: '{{$keg->pok->kode_akun}}',
                        satuan: '{{$keg->pok->satuan}}',
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#daftar-petugas').html(result.view);
                    }

                });

            });

        });
    </script>
    @endpush
</x-default-layout>