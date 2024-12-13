<x-default-layout>
    @push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <!--begin::Form-->
    <form id="form_create_sk" method="post" action="{{ route('kegiatan.item.store') }}" class="form d-flex flex-column flex-lg-row">
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
                            <label class="form-label mb-0 mt-2">Output</label>
                            <div class="fw-semibold fs-6 bg-amber-300">{{ $pok->mak_output . ' : ' . $pok->output }}</div>
                            <!--end::Output-->
                            <!--begin::Sub Output-->
                            <label class="form-label mb-0 mt-2">Sub Output</label>
                            <div class="fw-semibold fs-6 bg-yellow-300">{{ $pok->mak_suboutput . ' : ' . $pok->suboutput }}</div>
                            <!--end::Sub Output-->
                            <!--begin::Komponen-->
                            <label class="form-label mb-0 mt-2">Komponen</label>
                            <div class="fw-semibold fs-6 bg-lime-300">{{ $pok->kode_komponen . ' : ' . $pok->komponen }}</div>
                            <!--end::Komponen-->
                            <!--begin::Akun-->
                            <label class="form-label mb-0 mt-2">Akun</label>
                            <div class="fw-semibold fs-6 bg-cyan-300">{{ $pok->kode_akun . ' : ' . $pok->akun }}</div>
                            <!--end::Akun-->
                            <!--begin::Detail-->
                            <label class="form-label mb-0 mt-2">Detail</label>
                            <div class="fw-semibold fs-6">- {{ $pok->item_kegiatan }}</div>
                            <input type="hidden" name="pok_id" value="{{$pok->id}}" />
                            <!--end::Detail-->
                            <!--begin::Anggaran-->
                            <label class="form-label mb-0 mt-2">Anggaran</label>
                            <div class="fw-semibold fs-6">{{ $pok->volume . ' ' . $pok->satuan . ' =>' . $pok->jumlah }}</div>
                            <input type="hidden" name="pok_id" value="{{$pok->id}}" />
                            <!--end::Anggaran-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">No SK</label>
                            <input type="text" class="form-control" placeholder="001" name="no" />
                            <div class="text-muted fs-7">Apa ya deskripsi untuk nomornya...</div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">SK Tentang</label>
                            <input type="text" class="form-control" placeholder="Kegiatan..." name="tentang" />
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
                            <div class="form-group">
                                <label for="sk_id">No SK (nanti pilih sk, trus muncul nama2 pegawai gitu, pake ajax, yg bisa diisi, bisa ga sih gitu)</label>
                                <input type="text" name="sk_id_2" id="sk_id_2" value="id">
                                <select class="form-control" id="sk_id" name="sk_id" required="">
                                    <option value="">Select 1</option>
                                    <option value="">Select 2</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="d-flex flex-column gap-5 mt-5">
                        <div id="area_id"></div>
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tanggal Berlaku</label>
                            <input type="date" name="tgl_berlaku" placeholder="Select a date" class="form-control mb-2" />
                            <!-- <div class="text-muted fs-7">Set the date of the order to process.</div> -->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <label class="required form-label">Tanggal Ditetapkan</label>
                            <input type="date" name="tgl_ditetapkan" placeholder="Select a date" class="form-control mb-2" />
                            <!-- <div class="text-muted fs-7">Set the date of the order to process.</div> -->
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
                        <table>
                            <thead>
                                <tr class="flex">
                                    <td class="w-3/5">Uraian</td>
                                    <td class="w-2/5">Honor per satuan</td>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < 10; $i++)
                                    <tr class="flex">
                                    <td class="w-3/5"><input class="form-control p-1 w-full border-2" type="text" name="uraian_honor[]"></td>
                                    <td class="w-2/5"><input class="form-control p-1 w-full border-2" type="number" name="honor[]"></td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
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
                                            <select class="form-select" name="petugas" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option" required>
                                                <option></option>
                                                <option value="p->status">$p->list</option>
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
        var cluster_id_property = document.getElementById('sk_id_2').value;
        var area_id = document.getElementById('area_id').value;
        $.ajax({
            'url': '{{ route("kegiatan.item.get-petugas") }}',
            'type': 'POST',
            'dataType': 'JSON',
            'data': {
                area_id: area_id
            },
            success: function(response) {
                $('#sk_id').find('option').not(':first').remove();
                $.each(response, function(index, data) {
                    console.log('hai');
                    $('#sk_id').append('<option value="' + data['cluster_id_primary'] + '" ' + (area_id == data['cluster_id_primary'] ? ' selected ' : '') + '>' + data['cluster_name'] + '</option>');

                    // $('#sk_id').append('<option value="' + data['cluster_id_primary'] + '">' + data['cluster_name'] + '</option>');
                });
            }
        });
    </script>
    @endpush
</x-default-layout>