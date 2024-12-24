<x-default-layout>

    @section('title')
    Edit Nomor Surat
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Edit Nomor Surat Tim Kerja</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" action="{{ route('no-surat.tim.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Tahun</span>
                            </label>
                            <select id="tahun-dropdown" name="tahun" class="form-control form-control-solid">
                                <option value="{{$data->tahun}}" hidden>{{$data->tahun}}</option>
                                @foreach($list_tahun as $thn)
                                <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Tim</span>
                            </label>
                            <select id="tim-dropdown" name="tim" class="form-control form-control-solid" data-placehoder="Pilih Tim Kerja..." required>
                                <option value="{{$data->tim->id}}">{{$data->tim->singkatan}} - {{$data->tim->kode}}</option>
                            </select>
                            @error('tim')
                            <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!-- end::Row -->

                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Nomor</span>
                            </label>
                            <input name="no" type="text" class="form-control form-control-solid" placeholder="001" value="{{ $data->no }}" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Jenis</span>
                            </label>
                            <input name="jenis" type="text" list="jenis_nomor" class="form-control form-control-solid" placeholder="Masukkan Jenis Surat..." value="{{ $data->jenis }}" />
                            <datalist id="jenis_nomor">
                                <option value="ST">ST</option>
                                <option value="SPJ">SPJ</option>
                                <option value="BAST">BAST</option>
                                <option value="SK">SK</option>
                            </datalist>
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!-- end::Row -->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="required fs-6 fw-semibold form-label mb-2">Tanggal</label>
                    <input name="tgl" type="date" class="form-control form-control-solid" value="{{ $data->tgl }}" />
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="required fs-6 fw-semibold form-label mb-2">Rincian</label>
                    <input name="rincian" type="text" class="form-control form-control-solid" placeholder="Masukkan rincian..." value="{{ $data->rincian }}" />
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <label class="fs-6 fw-semibold form-label mb-2">Keterangan</label>
                    <textarea name="keterangan" rows="2" class="form-control form-control-solid" placeholder="Masukkan keterangan jika ada...">{{ $data->keterangan }}</textarea>
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <a href="{{ route('no-surat.tim.index') }}" class="btn btn-light me-3">Kembali</a>
                    <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Tables Widget 9-->

    @push('scripts')
    <script>
        // Tahun Dropdown Change Event
        $('#tahun-dropdown').on('change', function() {
            var tahun = this.value;
            $("#tim-dropdown").html('');

            $.ajax({
                url: "{{url('api/fetch-tim')}}",
                type: "POST",
                data: {
                    tahun: tahun,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#tim-dropdown').html('<option value="" hidden>Pilih Tim Kerja...</option>');

                    $.each(result.tim, function(key, value) {
                        console.log(value.singkatan);
                        $("#tim-dropdown").append('<option value="' +
                            value.id + '">' + value.singkatan + ' - ' + value.kode + '</option>');
                    });
                }

            });

        });
    </script>
    @endpush

</x-default-layout>