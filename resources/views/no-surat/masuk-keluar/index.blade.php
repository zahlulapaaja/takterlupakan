<x-default-layout>

    @section('title')
    Nomor Surat Masuk Keluar
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">No Surat Masuk Keluar</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Klik untuk tambah nomor">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_no_surat_masuk_keluar">
                    <i class="ki-duotone ki-plus fs-2"></i>Tambah</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Compact form-->
                <div class="d-flex flex-row sm:flex-col justify-between mb-4">
                    <!--begin::Input group-->
                    <div class="position-relative w-md-400px me-md-2">
                        <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input id="searchNoSurat" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                    </div>
                    <!--end::Input group-->
                    <div class="position-relative d-flex flex-row">
                        <!--begin::Input group-->
                        <div class="flex me-md-2">
                            <select id="jenis-dropdown" name="jenis" class="form-control form-control-solid">
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="flex me-md-2">
                            <select id="tahun-dropdown" name="tahun" class="form-control form-control-solid">
                                @foreach($list_tahun as $thn)
                                <option value="{{ $thn->tahun }}">{{ $thn->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!--end::Compact form-->
                <!--begin::Table-->
                <div id="tabel-no-surat">
                    @include('no-surat.masuk-keluar._table-no-surat')
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->

    @include('no-surat.masuk-keluar._modal-add-no-surat')

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            // Tahun Dropdown Change Event
            $('#tahun-dropdown').on('change', function() {
                var tahun = this.value;
                $("#tabel-no-surat").html('');
                $("#jenis-dropdown").html('');

                $.ajax({
                    url: "{{url('api/get-no-surat-masuk-keluar')}}",
                    type: "POST",
                    data: {
                        tahun: tahun,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#jenis-dropdown').html('<option hidden>Pilih Jenis Surat...</option>');
                        $("#jenis-dropdown").append('<option value="masuk">Masuk</option>');
                        $("#jenis-dropdown").append('<option value="keluar">Keluar</option>');

                        // langsung ngasih result
                        $('#tabel-no-surat').html(res.view);
                        let table = $('.datatable').DataTable({
                            "bDestroy": true,
                        });

                        $('#searchNoSurat').on('keyup', function() {
                            table.search(this.value).draw();
                        });
                    }

                });

            });

            // Jenis Dropdown Change Event
            $('#jenis-dropdown').on('change', function() {
                var jenis = this.value;
                var tahun = $('#tahun-dropdown').find(":selected").val();
                $("#tabel-no-surat").html('');

                $.ajax({
                    url: "{{url('api/get-no-surat-masuk-keluar')}}",
                    type: "POST",
                    data: {
                        tahun: tahun,
                        jenis: jenis,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {

                        // langsung ngasih result
                        $('#tabel-no-surat').html(res.view);
                        let table = $('.datatable').DataTable({
                            "bDestroy": true,
                        });
                        $('#searchNoSurat').on('keyup', function() {
                            table.search(this.value).draw();
                        });
                    }
                });
            });

        });
    </script>
    @endpush
</x-default-layout>