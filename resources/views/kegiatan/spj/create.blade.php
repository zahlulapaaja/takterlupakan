<x-default-layout>

    @section('title')
    Membuat SPJ Kegiatan
    @endsection

    @push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <!--begin::Form-->
    <form id="form_create_sk" method="post" action="{{ route('kegiatan.spj.store') }}" class="form d-flex flex-column flex-lg-row">
        @csrf
        @method('POST')
        <!--begin::Aside column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
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

            <div class="d-flex flex-column flex-lg-row gap-7">
                <!--begin::No SPJ details-->
                <div class="w-full w-lg-1/2 card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Nomor SPJ</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5">
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <label class="required form-label">No SPJ</label>
                                <input type="text" class="form-control" placeholder="001" name="no" required />
                                <div class="text-muted fs-7">Nomor terakhir tahun ini : {{$last_no}}</div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <label class="required form-label">Tanggal SPJ</label>
                                <input type="date" name="tgl_spj" class="form-control mb-2" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <label class="required form-label">Tim Kerja (perlu ga ya)</label>
                                <select class="form-select" name="tim" required>
                                    <option hidden>Pilih Tim Kerja</option>
                                    @for($i = 0; $i < 5; $i++)
                                        <option value="{{$i}}">Tim {{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::No SPJ details-->

                <!--begin::Kegiatan details-->
                <div class="w-full w-lg-1/2 card card-flush py-4">
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan..." name="nama_kegiatan" />
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-column flex-md-row gap-5">
                                <!--begin::Input group-->
                                <div class="fv-row flex-row-fluid">
                                    <label class="required form-label">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" class="form-control mb-2" />
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row flex-row-fluid">
                                    <label class="required form-label">Tanggal Akhir</label>
                                    <input type="date" name="tgl_akhir" class="form-control mb-2" />
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <label class="required form-label">PJK</label>
                                <select class="form-select" name="pjk" required>
                                    <option hidden>Pilih PJK</option>
                                    @foreach($list_pegawai as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Kegiatan details-->
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
                        <select id="no-sk-dropdown" class="form-select" name="tim" data-placeholder="Pilih Tim Kerja" required>
                            <option hidden>Pilih No SK</option>
                            @foreach($sk as $s)
                            <option value="{{$s->id}}">{{$s->no . '/SK/BPS-1107/' . $s->tahun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div id="daftar-petugas" class="my-4">
                        @include('kegiatan.spj._table-alokasi-beban')
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Petugas-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('pok') }}" id="form_create_sk_cancel" class="btn btn-light me-5">Kembali</a>
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
        <!--end::Aside column-->

    </form>
    <!--end::Form-->

    @push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/ecommerce/sales/save-order.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
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