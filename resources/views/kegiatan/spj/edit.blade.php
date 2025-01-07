<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.spj.edit', $data->id) }}
    @endsection

    @push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <!--begin::Form-->
    <form id="form_update_spj" method="post" action="{{ route('kegiatan.spj.update', $data->id) }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('PUT')
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
                            <input type="hidden" name="kegiatans_id" value="{{$data->kegiatans_id}}" />
                            <input type="hidden" name="akun" value="{{$keg->pok->kode_akun}}" />
                            <input type="hidden" name="tahun" value="{{$data->tahun}}" />
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
                            <input type="date" class="form-control" name="tgl" value="{{$data->tgl}}" required />
                        </div>
                        <!--end::Input group-->

                        @if($keg->pok->kode_akun == config('constants.AKUN_TRANSLOK'))
                        <div class="d-flex flex-column flex-md-row gap-5">
                            <!--begin::Input group-->
                            <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                <label class="form-label">Nomor Surat Tugas</label>
                                <input name="no_st" type="text" list="nomot_st" class="form-control mb-2" placeholder="Masukkan Nomor Surat..." value="{{$data->no_st}}" required />
                                <div class="text-muted fs-7">Buat surat tugas di menu Nomor Surat - Tim Kerja</div>
                                <datalist id="nomot_st">
                                    @foreach($nomor_st as $n)
                                    <option value="{{$n->no_surat}}">{{$n->no_surat}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="w-full w-lg-1/2 fv-row flex-row-fluid">
                                <label class="form-label">Tanggal Surat Tugas</label>
                                <input type="date" name="tgl_st" class="form-control mb-2" value="{{$data->tgl_st}}" />
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

                    @if($keg->pok->kode_akun == config('constants.AKUN_HONOR'))
                    <!--begin::Input group-->
                    <div id="daftar-petugas-honor" class="my-4">
                        @include('kegiatan.spj._table-edit-alokasi-beban')
                    </div>
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

                                    @foreach($data->petugas as $ptg)
                                    <div data-repeater-item="" class="form-group d-flex flex-column flex-lg-row gap-3">
                                        <!--begin::Select2-->
                                        <div class="w-full w-lg-1/6">
                                            <select class="form-select" name="petugas" data-kt-ecommerce-catalog-add-product="product_option" required>
                                                <option value="{{$ptg->status . '-' . $ptg->id_status}}" selected>{{'[' . $ptg->status . '] ' . $ptg->nama}}</option>
                                                @foreach($list_petugas as $p)
                                                <option value="{{$p->status . '-' . $p->id}}">{{$p->list}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Select2-->
                                        <!--begin::Input-->
                                        <span class="d-flex flex-row w-full w-lg-1/6 gap-2">
                                            <input type="number" class="form-control" name="byk_kunj" placeholder="Byk Kunj..." value="{{$ptg->byk_kunj}}" required />
                                            <span class="text-left text-lg my-auto text-nowrap mx-1">{{$keg->pok->satuan}}</span>
                                        </span>
                                        <input type="text" class="form-control w-full w-lg-1/6" name="melakukan" placeholder="Melakukan" value="{{$ptg->melakukan}}" required />
                                        <input type="text" class="form-control w-full w-lg-1/6" name="lokasi" placeholder="Lokasi" value="{{$ptg->lokasi}}" required />
                                        <input type="text" class="form-control w-full w-lg-1/6" name="tgl_kunj" placeholder="Tgl Kunj" value="{{$ptg->tgl_kunj}}" required />
                                        <span class="d-flex flex-row w-full w-lg-1/6 gap-2">
                                            <input type="number" class="form-control" name="nominal" placeholder="Realisasi" value="{{$ptg->nominal}}" required />
                                            <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger my-auto">
                                                <i class="ki-duotone ki-cross fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </button>
                                        </span>
                                        <!--end::Input-->
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group mt-5">
                                <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>Tambah petugas
                                </button>
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
                <a href="{{ route('pok.index') }}" id="form_update_spj_cancel" class="btn btn-light me-5">Kembali</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="form_update_spj_submit" class="btn btn-primary">
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