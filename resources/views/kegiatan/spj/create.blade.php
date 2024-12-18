<x-default-layout>

    @section('title')
    Membuat SPJ Kegiatan
    @endsection

    @push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

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
                            <!--begin::Akun-->
                            <label class="form-label bg-cyan-300 mb-0 mt-2">Akun</label>
                            <div class="fw-semibold fs-6">{{ $pok->kode_akun . ' : ' . $pok->akun }}</div>
                            <input type="hidden" name="kode_akun" value="{{$pok->kode_akun}}" />
                            <!--end::Akun-->
                            <!--begin::Detil Kegiatan-->
                            <label class="form-label mb-0 mt-2">Detil Kegiatan</label>
                            <div class="fw-semibold fs-6">{{ $pok->item_kegiatan }}</div>
                            <input type="hidden" name="item_kegiatan" value="{{$pok->id}}" />
                            <!--end::Detil Kegiatan-->
                            <!--begin::Anggaran-->
                            <label class="form-label mb-0 mt-2">Anggaran</label>
                            <div class="fw-semibold fs-6">{{ $pok->volume . ' ' . $pok->satuan . ' => ' . $pok->jumlah }}</div>
                            <input type="hidden" name="anggaran" value="{{$pok->jumlah}}" />
                            <!--end::Anggaran-->
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
                        <h2>Nomor SPJ</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column gap-10">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">No SPJ</label>
                            <input type="text" class="form-control" placeholder="001" name="no" />
                            <div class="text-muted fs-7">Nomor terakhir tahun ini : $last_no</div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Kegiatan..." name="tentang" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tim Kerja (perlu ga ya)</label>
                            <select class="form-select" name="tim" data-placeholder="Pilih Tim Kerja" required>
                                <option></option>
                                @for($i = 0; $i < 5; $i++)
                                    <option value="{{$i}}">Tim {{$i}}</option>
                                    @endfor
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Kegiatan..." name="tentang" /> -->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">PJK</label>
                            <select class="form-select" name="tim" data-placeholder="Pilih Tim Kerja" required>
                                <option hidden>Pilih PJK</option>
                                @foreach($list_pegawai as $p)
                                <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Kegiatan..." name="tentang" /> -->
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
                        <h2>Jadwal Kegiatan</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="d-flex flex-column flex-md-row gap-5">
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid">
                            <label class="required form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" placeholder="Select a date" class="form-control mb-2" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid">
                            <label class="required form-label">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" placeholder="Select a date" class="form-control mb-2" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="d-flex flex-column gap-5 mt-5">
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tanggal SPJ</label>
                            <input type="date" name="tgl_berlaku" placeholder="Select a date" class="form-control mb-2" />
                            <!-- <div class="text-muted fs-7">Set the date of the order to process.</div> -->
                        </div>
                        <!--end::Input group-->
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
                    <div class="fv-row">
                        <label class="required form-label">No SK</label>
                        <select id="no-sk-dropdown" class="form-select" name="tim" data-placeholder="Pilih Tim Kerja" required>
                            <option></option>
                            @foreach($sk as $s)
                            <option value="{{$s->id}}">No {{$s->no}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" class="form-control" placeholder="Kegiatan..." name="tentang" /> -->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="my-4" data-kt-ecommerce-catalog-add-product="auto-options">
                        <!--begin::Label-->
                        <label class="form-label">Petugas</label>
                        <!--end::Label-->
                        <!--begin::Repeater-->
                        <div id="daftar_petugas">
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div id="daftar-beban" data-repeater-list="daftar_petugas" class="d-flex flex-column gap-3">
                                    <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                        <!--begin::Select2-->
                                        <div class="w-2/5">
                                            <select class="form-select" name="petugas" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option" required>
                                                <option></option>
                                                <!-- foreach($list_petugas as $p) -->
                                                <option value="$p->status . '-' . $p->id">$p->list</option>
                                                <!-- endforeach -->
                                            </select>
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
        <!--end::Main column-->
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
            $('#daftar_petugas').repeater();



            // No SK Dropdown Change Event
            $('#no-sk-dropdown').on('change', function() {
                var id_sk = this.value;
                $("#daftar-beban").html('');

                $.ajax({
                    url: "{{url('api/fetch-beban')}}",
                    type: "POST",
                    data: {
                        id_sk: id_sk,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        var list = "";
                        $('#daftar-beban').html('<h1>Hai</h1>');

                        $.each(result.petugas, function(key, value) {
                            //     console.log(value);
                            $("#daftar-beban").append('<h1>Halo</h1>');
                        });
                    }

                });

            });

        });
    </script>
    @endpush
</x-default-layout>