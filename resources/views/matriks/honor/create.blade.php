<x-default-layout>

    @section('title')
    Matriks
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('matriks.honor.create') }}
    @endsection

    <!--begin::Form-->
    <form id="form_create_matriks_honor" method="post" action="{{ route('matriks.honor.store') }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('POST')
        <!--begin::Aside column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
            <div class="d-flex flex-column flex-lg-row gap-7 gap-lg-10">
                <!--begin::Order details-->
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
                                <input type="hidden" name="tahun" value="{{$keg->pok->tahun}}" />
                                <!--begin::MAK-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5 mb-2">
                                    <label class="w-32 font-semibold fs-6">MAK</label>
                                    <div class="fw-semibold fs-6 bg-cyan-300">{{ $keg->mak }}</div>
                                </div>
                                <!--end::MAK-->
                                <!--begin::Nama Kegiatan-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5 mb-2">
                                    <label class="w-32 font-semibold fs-6">Nama Kegiatan</label>
                                    <div class="fw-semibold fs-6">{{ $keg->nama }}</div>
                                </div>
                                <!--end::Nama Kegiatan-->
                                <!--begin::Jadwal Kegiatan-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5 mb-2">
                                    <label class="text-nowrap w-32 font-semibold fs-6">Jadwal Kegiatan</label>
                                    <div class="fw-semibold fs-6">{{date_indo($keg->tgl_mulai)}} s.d. {{date_indo($keg->tgl_akhir)}}</div>
                                </div>
                                <!--end::Jadwal Kegiatan-->
                                <!--begin::PJK-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5 mb-2">
                                    <label class="w-32 font-semibold fs-6">PJK</label>
                                    <div class="fw-semibold fs-6">{{$keg->pjk->nama}}</div>
                                </div>
                                <!--end::PJK-->
                                <!--begin::Detil Kegiatan-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5 mb-2">
                                    <label class="w-32 font-semibold fs-6 text-nowrap">Detil Kegiatan</label>
                                    <div class="fw-semibold fs-6">{{ $keg->pok->item_kegiatan }}</div>
                                </div>
                                <!--end::Detil Kegiatan-->
                                <!--begin::Anggaran-->
                                <div class="d-flex flex-column flex-lg-row py-auto gap-x-5 mb-2">
                                    <label class="w-32 font-semibold fs-6">Anggaran</label>
                                    <div class="fw-semibold fs-6 d-flex flex-column">
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
                <!--begin::Order details-->
                <div class="card card-flush py-4 w-full">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Input Bulan</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5">
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <label class="required form-label">Bulan</label>
                                <select name="bulan" aria-label="Select a Month" class="form-select form-select-sm form-select-solid">
                                    @foreach($keg->bulan as $b)
                                    <option value="{{$b}}">{{date_indo_bulan($b)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Order details-->
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
                    <div id="daftar-petugas-honor" class="my-4">
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Petugas-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('kegiatan.index') }}" id="form_create_matriks_honor_cancel" class="btn btn-light me-5">Kembali</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="form_create_matriks_honor_submit" class="btn btn-primary">
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
                $("#daftar-petugas-honor").html('');

                $.ajax({
                    url: "{{url('api/fetch-beban-honor')}}",
                    type: "POST",
                    data: {
                        id_sk: id_sk,
                        pok_id: '{{$keg->pok->id}}',
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