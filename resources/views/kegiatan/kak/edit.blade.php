<x-default-layout>

    @section('title')
    Kegiatan
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('kegiatan.kak.edit', $data->id) }}
    @endsection

    <!--begin::Form-->
    <form id="form_edit_kak" method="post" action="{{ route('kegiatan.kak.update', $data->id) }}" class="form d-flex flex-column gap-7 gap-lg-10" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                            @foreach($pok->list_detil as $p)
                            @if($loop->first || ($p->kode_akun != $akun))
                            <div class="d-flex flex-column flex-lg-row justify-between gap-x-4">
                                <div class="w-3/4 d-flex flex-row">
                                    <label class="font-bold bg-cyan-300 me-auto">{{$p->kode_akun}}</label>
                                </div>
                                <div class="w-250px d-flex flex-row gap-x-2">
                                    <label class="font-bold me-auto">Volume</label>
                                    <label class="font-bold me-auto">Harga</label>
                                </div>
                            </div>
                            @endif
                            <div class="d-flex flex-column flex-lg-row justify-between gap-x-4">
                                <div class="w-3/4 d-flex flex-row">
                                    @if(in_array($p->id, $data->list_pok))
                                    <input id="{{$p->id}}" class="form-check-input me-3" name="detil[]" type="checkbox" value="{{$p->id}}" checked />
                                    @else
                                    <input id="{{$p->id}}" class="form-check-input me-3" name="detil[]" type="checkbox" value="{{$p->id}}" />
                                    @endif
                                    <label for="{{$p->id}}">{{$p->item_kegiatan}}</label>
                                </div>
                                <div class="w-250px d-flex flex-row gap-x-2">
                                    <input type="hidden" name="id_pok[]" value="{{$p->id}}">
                                    @if(in_array($p->id, $data->list_pok))
                                    @foreach($data->poks as $d)
                                    @if($d->poks_id == $p->id)
                                    <input type="number" name="vol[]" class="form-control" value="{{$d->volume}}" required>
                                    <input type="number" name="harga[]" class="form-control" value="{{$d->harga}}" required>
                                    @endif
                                    @endforeach
                                    @else
                                    <input type="number" name="vol[]" class="form-control" value="{{$p->volume}}" required>
                                    <input type="number" name="harga[]" class="form-control" value="{{$p->harga}}" required>
                                    @endif
                                </div>
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
                        <label class="form-label">Jenis KAK</label>
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->jenis == 'kegiatan')
                                <input id="kegiatan" class="form-check-input" name="jenis" type="radio" value="kegiatan" checked />
                                @else
                                <input id="kegiatan" class="form-check-input" name="jenis" type="radio" value="kegiatan" disabled />
                                @endif
                                <label for="kegiatan">Kegiatan</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->jenis == 'pelatihan')
                                <input id="pelatihan" class="form-check-input" name="jenis" type="radio" value="pelatihan" checked />
                                @else
                                <input id="pelatihan" class="form-check-input" name="jenis" type="radio" value="pelatihan" disabled />
                                @endif
                                <label for="pelatihan">Pelatihan</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->jenis == 'perjadin')
                                <input id="perjadin" class="form-check-input" name="jenis" type="radio" value="perjadin" checked />
                                @else
                                <input id="perjadin" class="form-check-input" name="jenis" type="radio" value="perjadin" disabled />
                                @endif
                                <label for="perjadin">Perjadin</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->jenis == 'pengadaan')
                                <input id="pengadaan" class="form-check-input" name="jenis" type="radio" value="pengadaan" checked />
                                @else
                                <input id="pengadaan" class="form-check-input" name="jenis" type="radio" value="pengadaan" disabled />
                                @endif
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
                        <input type="text" class="form-control" placeholder="Masukkah Judul KAK..." name="judul" value="{{$data->judul}}" required />
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
                                <option value="{{$data->tim}}" selected hidden>{{$data->pj}}</option>
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
                            <label class="required form-label">Pilih PPK</label>
                            <select class="form-select" name="ppk" required>
                                <option value="{{$data->ppk}}" selected hidden>
                                    @if($data->ppk == $ref->ppk->id)
                                    {{$ref->ppk->nama}}
                                    @elseif($data->ppk == $ref->ppk2->id)
                                    {{$ref->ppk2->nama}}
                                    @endif
                                </option>
                                <option value="{{$ref->ppk->id}}">{{$ref->ppk->nama}}</option>
                                <option value="{{$ref->ppk2->id}}">{{$ref->ppk2->nama}}</option>
                            </select>
                            @error('tgl')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <label class="required form-label">Tanggal Disahkan</label>
                        <input type="date" name="tgl" class="form-control mb-2" placeholder="Select a date" value="{{$data->tgl}}" required />
                        @error('tgl')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Detail KAK-->
        @if($data->jenis == 'perjadin')
        <!--begin::Peserta Perjadin [Perjadin]-->
        <div class="card card-flush py-4 perjadin">
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
                                @foreach($data->peserta_perjadin as $pp)
                                <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                    <!--begin::Select2-->
                                    <div class="w-4/5">
                                        <select class="form-select" name="peserta" data-kt-ecommerce-catalog-add-product="product_option">
                                            <option value="{{$pp->pegawais_id}}" selected hidden>{{$pp->pegawai->nama}}</option>
                                            @foreach($pegawai as $p)
                                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Select2-->
                                    <button type="button" data-repeater-delete="" class="w-1/5 btn btn-sm btn-icon btn-light-danger">
                                        <i class="ki-duotone ki-cross fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                                @endforeach
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
        <!--end::Peserta Perjadin [Perjadin]-->
        @endif
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
                        <textarea id="latar_belakang" name="latar_belakang" rows="8" placeholder="Masukkan latar belakang..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$data->latar_belakang}}</textarea>
                        @error('latar_belakang')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full">
                        <label for="tujuan" class="required form-label">Maksud Tujuan</label>
                        <textarea id="tujuan" name="tujuan" rows="4" placeholder="Masukkan maksud dan tujuan..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$data->tujuan}}</textarea>
                        @error('tujuan')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row flex flex-column w-full">
                        <label for="target" class="required form-label">Target/Sasaran</label>
                        <textarea id="target" name="target" rows="4" placeholder="Masukkan target/sasaran..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{$data->target}}</textarea>
                        @error('target')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    @if($data->jenis == 'pengadaan')
                    <!--begin::Input group [Pengadaan]-->
                    <div class="fv-row flex flex-column w-full pengadaan">
                        <label for="metode" class="required form-label">Metode Pengadaan Barang/Jasa</label>
                        <textarea id="metode" name="metode" rows="4" placeholder="Masukkan metode pengadaan barang/jasa..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$data->metode}}</textarea>
                        @error('metode')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group [Pengadaan]-->
                    @endif
                    @if($data->jenis != 'pelatihan')
                    <div class="fv-row d-flex flex-column flex-md-row gap-5">
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid w-full">
                            <label class="required form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_awal" placeholder="Select a date" class="form-control mb-2" value="{{$data->tgl_awal}}" />
                            @error('tgl_awal')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row flex-row-fluid w-full">
                            <label class="form-label">Tanggal Akhir (jika ada)</label>
                            <input type="date" name="tgl_akhir" placeholder="Select a date" class="form-control mb-2" value="{{$data->tgl_akhir}}" />
                            @error('tgl_akhir')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <label class="required form-label">Tempat</label>
                        <input type="text" class="form-control" placeholder="Masukkah Tempat Kegiatan..." name="tempat" value="{{$data->tempat}}" />
                        <div class="text-muted fs-7">Jika perjadin maksudnya adalah tujuan perjalanan</div>
                        @error('tempat')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    @endif
                    @if($data->jenis == 'pelatihan')
                    <!--begin::Input group [Pelatihan]-->
                    <div class="fv-row flex flex-column w-full pelatihan hidden">
                        <label for="waktu_tempat_pelatihan" class="required form-label">Waktu dan Tempat Pelaksanaan</label>
                        <textarea id="waktu_tempat_pelatihan" name="waktu_tempat_pelatihan" rows="4" placeholder="Masukkan penjelasan waktu dan tempat pelatihan..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$data->pelatihan->waktu_tempat}}</textarea>
                        @error('waktu_tempat_pelatihan')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group [Pelatihan]-->
                    <!--begin::Input group [Pelatihan]-->
                    <div class="fv-row flex flex-column pelatihan">
                        <div class="leading-tight mb-2">
                            <label class="required form-label m-0">Komponen Pelatihan</label>
                            <div class="text-muted fs-8">Centang komponen yang ditanggung oleh panitia penyelenggaran</div>
                        </div>
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->pelatihan->konsumsi)
                                <input id="konsumsi_pelatihan" class="form-check-input" name="konsumsi_pelatihan" type="checkbox" checked />
                                @else
                                <input id="konsumsi_pelatihan" class="form-check-input" name="konsumsi_pelatihan" type="checkbox" />
                                @endif
                                <label for="konsumsi_pelatihan">Konsumsi</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->pelatihan->akomodasi)
                                <input id="akomodasi_pelatihan" class="form-check-input" name="akomodasi_pelatihan" type="checkbox" checked />
                                @else
                                <input id="akomodasi_pelatihan" class="form-check-input" name="akomodasi_pelatihan" type="checkbox" />
                                @endif
                                <label for="akomodasi_pelatihan">Akomodasi</label>
                            </div>
                            <div class="d-flex flex-row gap-x-2">
                                @if($data->pelatihan->translok)
                                <input id="translok_pelatihan" class="form-check-input" name="translok_pelatihan" type="checkbox" checked />
                                @else
                                <input id="translok_pelatihan" class="form-check-input" name="translok_pelatihan" type="checkbox" />
                                @endif
                                <label for="translok_pelatihan">Tranport Lokal</label>
                            </div>
                        </div>
                        @error('konsumsi_pelatihan')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group [Pelatihan]-->
                    <!--begin::Input group [Pelatihan]-->
                    <div class="fv-row flex flex-column w-full pelatihan">
                        <label for="peserta_pelatihan" class="required form-label">Peserta Pelatihan</label>
                        <textarea id="peserta_pelatihan" name="peserta_pelatihan" rows="4" placeholder="Masukkan penjelasan peserta pelatihan..." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$data->pelatihan->peserta}}</textarea>
                        @error('peserta_pelatihan')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!--end::Input group [Pelatihan]-->
                    @endif
                    @if($data->jenis == 'pengadaan')
                    <!--begin::Input group [Pengadaan]-->
                    <div class="pengadaan" data-kt-ecommerce-catalog-add-product="auto-options">
                        <!--begin::Label-->
                        <label class="required form-label">Input Spesifikasi</label>
                        <!--end::Label-->
                        <!--begin::Repeater-->
                        <div id="daftar_spesifikasi">
                            <!--begin::Form group-->
                            <div class="form-group fs-7">
                                <div data-repeater-list="daftar_spesifikasi" class="d-flex flex-column gap-3">
                                    @foreach($data->spesifikasi as $s)
                                    <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                        <input type="text" class="form-control fs-7 p-2 w-2/5" name="rincian" placeholder="Rincian..." value="{{$s->rincian}}" />
                                        <div class="d-flex flex-row gap-x-3 w-1/5">
                                            <input type="number" class="form-control fs-7 p-2" name="volume" placeholder="Vol..." value="{{$s->volume}}" />
                                            <input type="text" class="form-control fs-7 p-2" name="satuan" placeholder="Satuan..." value="{{$s->satuan}}" />
                                        </div>
                                        <input type="text" class="form-control fs-7 p-2 w-1/5" name="spesifikasi" placeholder="Spesifikasi..." value="{{$s->spesifikasi}}" />
                                        <button type="button" data-repeater-delete="" class="w-1/5 btn btn-sm btn-icon btn-light-danger p-2">
                                            <i class="ki-duotone ki-cross fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                    </div>
                                    @endforeach
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
                    <!--end::Input group [Pengadaan]-->
                    @endif
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
                    <div class="fv-row d-flex flex-column">
                        <div>
                            <label for="file_lampiran" class="form-label">File Lampiran</label>
                            (<a href="{{ lampiran($data->file_lampiran) }}" class="text-blue-600 hover:text-blue-800 visited:text-purple-600 underline font-bold" target="_blank">Lihat</a>)
                        </div>
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
            <a href="{{ route('pok.index') }}" id="form_edit_kak_cancel" class="btn btn-light me-5">Kembali</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="form_edit_kak_submit" class="btn btn-primary">
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
            $('#daftar_spesifikasi').repeater();

            // $('#form_edit_kak input:radio').on('change', function() {
            //     $('.pelatihan').addClass('hidden');
            //     $('.perjadin').addClass('hidden');
            //     $('.pengadaan').addClass('hidden');

            //     if ($(this).val() == 'pelatihan') $('.pelatihan').removeClass('hidden');
            //     if ($(this).val() == 'perjadin') $('.perjadin').removeClass('hidden');
            //     if ($(this).val() == 'pengadaan') $('.pengadaan').removeClass('hidden');
            // });
        });
    </script>
    @endpush

</x-default-layout>