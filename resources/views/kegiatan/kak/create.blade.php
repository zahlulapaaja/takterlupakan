<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.kak.create') }}
    @endsection

    <!--begin::Form-->
    <form id="form_create_kak" method="post" action="{{ route('kegiatan.kak.store') }}" class="form d-flex flex-column gap-7 gap-lg-10">
        @csrf
        @method('POST')
        <input type="hidden" name="tahun" value="{{$pok->tahun}}" />
        <!--begin::Column-->
        <!--begin::Order details-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Detail Mata Anggaran</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="d-flex flex-column gap-10">
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Output-->
                        <label class="form-label bg-red-300 mb-0 mt-2">Program</label>
                        <div class="fw-semibold fs-6">{{ $pok->kode_program . ' : ' . $pok->program }}</div>
                        <!--end::Output-->
                        <!--begin::Output-->
                        <label class="form-label bg-orange-300 mb-0 mt-2">Kegiatan</label>
                        <div class="fw-semibold fs-6">{{ $pok->kode_kegiatan . ' : ' . $pok->kegiatan }}</div>
                        <!--end::Output-->
                        <!--begin::Output-->
                        <label class="form-label bg-amber-300 mb-0 mt-2">Output</label>
                        <div class="fw-semibold fs-6">{{ $pok->kode_kegiatan . '.' . $pok->kode_output . ' : ' . $pok->output }}</div>
                        <!--end::Output-->
                        <!--begin::Sub Output-->
                        <label class="form-label bg-yellow-300 mb-0 mt-2">Sub Output</label>
                        <div class="fw-semibold fs-6">{{ $pok->kode_kegiatan . '.' . $pok->kode_output . '.' . $pok->kode_suboutput . ' : ' . $pok->suboutput }}</div>
                        <!--end::Sub Output-->
                        <!--begin::Komponen-->
                        <label class="form-label bg-lime-300 mb-0 mt-2">Komponen</label>
                        <div class="fw-semibold fs-6">{{ $pok->kode_komponen . ' : ' . $pok->komponen }}</div>
                        <!--end::Komponen-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row d-flex flex-column">
                        <label class="required form-label">Detil Kegiatan</label>
                        <div class="d-flex flex-column gap-y-2">
                            @foreach($pok->list_detil as $key => $p)
                            @if($loop->first || ($p->kode_akun != $akun))
                            <label class="font-bold bg-cyan-300 me-auto">{{$p->kode_akun}}</label>
                            @endif
                            <div class="d-flex flex-row">
                                <input id="{{$p->id}}" class="form-check-input me-3" name="detil[]" type="checkbox" value="{{$p->id}}" />
                                <label for="{{$p->id}}">{{$p->item_kegiatan}}</label>
                            </div>
                            <?php $akun = $p->kode_akun; ?>
                            @endforeach
                        </div>
                        @error('detil')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Order details-->
        <!--begin::Detail KAK-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Detail KAK</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="d-flex flex-column gap-y-5">
                    <!--begin::Input group-->
                    <div class="fv-row d-flex flex-column">
                        <label class="required form-label">Jenis KAK</label>
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            <div class="d-flex flex-row gap-x-2">
                                <input id="kegiatan" class="form-check-input" name="jenis" type="radio" value="kegiatan" />
                                <label for="kegiatan">Kegiatan</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                <input id="pelatihan" class="form-check-input" name="jenis" type="radio" value="pelatihan" />
                                <label for="pelatihan">Pelatihan</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                <input id="perjadin" class="form-check-input" name="jenis" type="radio" value="perjadin" />
                                <label for="perjadin">Perjadin</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                <input id="pengadaan" class="form-check-input" name="jenis" type="radio" value="pengadaan" />
                                <label for="pengadaan">Pengadaan</label>
                            </div>
                        </div>
                        @error('detil')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <label class="required form-label">Judul KAK</label>
                        <input type="text" class="form-control" placeholder="Masukkah Judul KAK..." name="judul" required />
                        @error('judul')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <div class="d-flex flex-column flex-md-row gap-5">
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid w-full">
                            <label class="required form-label">Penanggung Jawab</label>
                            <select class="form-select" name="tim" required>
                                <option value="" hidden>Pilih PJ...</option>
                                <option value="0">Kepala {{config('constants.SATKER')}}</option>
                                @foreach($tim as $t)
                                <option value="{{$t->id}}">{{$t->nama}}</option>
                                @endforeach
                            </select>
                            @error('pjk')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid w-full">
                            <label class="required form-label">Tanggal Disahkan</label>
                            <input type="date" name="tgl" placeholder="Select a date" class="form-control mb-2" required />
                            @error('tgl')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Detail KAK-->
        <!--begin::Peserta Perjadin-->
        <div class="card card-flush py-4 perjadin hidden">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Peserta Perjadin</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                    <!--begin::Label-->
                    <label class="form-label">Pilih Peserta</label>
                    <!--end::Label-->
                    <!--begin::Repeater-->
                    <div id="daftar_peserta_perjadin">
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div data-repeater-list="daftar_peserta_perjadin" class="d-flex flex-column gap-3">
                                <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                    <!--begin::Select2-->
                                    <div class="w-4/5">
                                        <select class="form-select" name="peserta" data-kt-ecommerce-catalog-add-product="product_option">
                                            <option value="" hidden>Pilih Pegawai...</option>
                                            @foreach($pegawai as $p)
                                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Select2-->
                                    <!--begin::Input-->
                                    <!-- <input type="text" class="form-control w-2/5" name="sebagai" placeholder="Sebagai" required /> -->
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
                                <i class="ki-duotone ki-plus fs-2"></i>Tambah peserta</button>
                        </div>
                        <!--end::Form group-->
                    </div>
                    <!--end::Repeater-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Peserta Perjadin-->
        <!--begin::Badan KAK-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Badan KAK</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="d-flex flex-column gap-y-5">
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full">
                        <label for="latar_belakang" class="required form-label">Latar Belakang</label>
                        <textarea id="latar_belakang" name="latar_belakang" rows="8" placeholder="Masukkan latar belakang..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                        @error('latar_belakang')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full">
                        <label for="tujuan" class="required form-label">Maksud Tujuan</label>
                        <textarea id="tujuan" name="tujuan" rows="4" placeholder="Masukkan maksud dan tujuan..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                        @error('tujuan')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full">
                        <label for="manfaat" class="required form-label">Manfaat</label>
                        <textarea id="manfaat" name="manfaat" rows="4" placeholder="Masukkan manfaat..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                        @error('manfaat')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full pengadaan hidden">
                        <label for="metode" class="required form-label">Metode</label>
                        <textarea id="metode" name="metode" rows="4" placeholder="Masukkan metode..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error('metode')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row d-flex flex-column flex-md-row gap-5">
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid w-full">
                            <label class="required form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_awal" placeholder="Select a date" class="form-control mb-2" />
                            @error('tgl_awal')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid w-full">
                            <label class="form-label">Tanggal Akhir (jika ada)</label>
                            <input type="date" name="tgl_akhir" placeholder="Select a date" class="form-control mb-2" />
                            @error('tgl_akhir')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <label class="required form-label">Tempat</label>
                        <input type="text" class="form-control" placeholder="Masukkah Tempat Kegiatan..." name="tempat" />
                        <div class="text-muted fs-7">Jika perjadin maksudnya adalah tujuan perjalanan</div>
                        @error('tempat')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full pengadaan hidden">
                        <label for="spesifikasi" class="required form-label">Spesifikasi</label>
                        <textarea id="spesifikasi" name="spesifikasi" rows="4" placeholder="Masukkan spesifikasi..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error('spesifikasi')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Badan KAK-->
        <!--begin::Upload Lampiran-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Lampiran</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="d-flex flex-column gap-y-5">
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full">
                        <label for="lampiran" class="form-label">Lampiran</label>
                        <textarea id="lampiran" name="lampiran" rows="4" placeholder="Harusnya text editor..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error('lampiran')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row d-flex flex-column">
                        <label for="file_lampiran" class="form-label">File Lampiran</label>
                        <input class="form-control" type="file" id="file_lampiran" name="file_lampiran">
                        <div class="text-muted fs-7">Jenis file yang diperbolehkan hanya .pdf</div>
                        @error('file_lampiran')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Upload Lampiran-->

        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="{{ route('pok.index') }}" id="form_create_kak_cancel" class="btn btn-light me-5">Kembali</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="form_create_kak_submit" class="btn btn-primary">
                <span class="indicator-label">Simpan</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
        <!--end::Column-->
    </form>
    <!--end::Form-->

    @push('scripts')
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#daftar_peserta_perjadin').repeater();

            $('#form_create_kak input:radio').on('change', function() {
                $('.perjadin').addClass('hidden');
                $('.pengadaan').addClass('hidden');

                if ($(this).val() == 'perjadin') $('.perjadin').removeClass('hidden');
                if ($(this).val() == 'pengadaan') $('.pengadaan').removeClass('hidden');

            });
        });
    </script>
    @endpush

</x-default-layout>