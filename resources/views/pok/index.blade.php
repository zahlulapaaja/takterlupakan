<x-default-layout>

    @section('title')
    POK
    @endsection

    <!--begin::Tables Widget 12-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">POK</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Selamat mengerjakan</span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-category fs-6">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                </button>
                <!--begin::Menu 2-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator mb-3 opacity-75"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">New Ticket</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">New Customer</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                        <!--begin::Menu item-->
                        <a href="#" class="menu-link px-3">
                            <span class="menu-title">New Group</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--end::Menu item-->
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Admin Group</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Staff Group</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Member Group</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">New Contact</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator mt-3 opacity-75"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content px-3 py-3">
                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                        </div>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu 2-->
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Compact form-->
            <div class="d-flex flex-row sm:flex-col justify-between mb-4">
                <!--begin::Input group-->
                <div class="position-relative w-md-400px me-md-2">
                    <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input id="searchPok" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                </div>
                <!--end::Input group-->
                <div class="position-relative d-flex flex-row">
                    <!--begin::Input group-->
                    <div class="flex me-md-2">
                        <select id="revisi-dropdown" name="revisi" class="form-control form-control-solid">
                            @foreach($list_revisi as $rvs)
                            <option value="{{ $rvs->revisi }}">{{ $rvs->revisi }}</option>
                            @endforeach
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
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted bg-light">
                            <th class="ps-4 min-w-25px rounded-start">No</th>
                            <th class="min-w-500px">Kegiatan</th>
                            <th class="min-w-25px text-center">Vol</th>
                            <th class="min-w-25px text-center">Satuan</th>
                            <th class="min-w-125px text-center">Harga</th>
                            <th class="min-w-125px text-center">Jumlah</th>
                            <th class="min-w-25px text-center">Input Kegiatan</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody id="tabel-pok">
                        @include('pok._table-body-pok')
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 12-->

    @push('scripts')

    <script type="text/javascript">
        $(document).ready(function() {

            // Tahun Dropdown Change Event
            $('#tahun-dropdown').on('change', function() {
                var tahun = this.value;
                $("#revisi-dropdown").html('');

                $.ajax({
                    url: "{{url('api/fetch-revisi')}}",
                    type: "POST",
                    data: {
                        tahun: tahun,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#revisi-dropdown').html('<option hidden>Revisi Ke...</option>');

                        $.each(result.revisi, function(key, value) {
                            console.log(value);
                            $("#revisi-dropdown").append('<option value="' +
                                value.revisi + '">' + value.revisi + '</option>');
                        });
                    }

                });

            });

            // Revisi Dropdown Change Event
            $('#revisi-dropdown').on('change', function() {
                var revisi = this.value;
                var tahun = $('#tahun-dropdown').find(":selected").val();
                $("#tabel-pok").html('');

                $.ajax({
                    url: "{{url('api/get-pok')}}",
                    type: "POST",
                    data: {
                        tahun: tahun,
                        revisi: revisi,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#tabel-pok').html(res.view);
                    }
                });
            });

            var searchRequest = null;
            $(function() {
                var minlength = 3;

                $("#searchPok").keyup(function() {
                    var that = this,
                        value = $(this).val();
                    var tahun = $('#tahun-dropdown').find(":selected").val();
                    var revisi = $('#revisi-dropdown').find(":selected").val();

                    if (value.length >= minlength) {
                        if (searchRequest != null)
                            searchRequest.abort();
                        searchRequest = $.ajax({
                            type: "GET",
                            url: "{{ url('api/search-pok') }}",
                            data: {
                                'search_keyword': value
                            },
                            dataType: "json",
                            success: function(res) {
                                //we need to check if the value is the same
                                if (value == $(that).val()) {
                                    // console.log(value);
                                    $('#tabel-pok').html(res.view);
                                    //Receiving the result of search here
                                }
                            }
                        });
                    }
                });
            });
        });

        // $(document).ready(function() {
        // let table = $('.datatable').DataTable({
        // paging: false,
        // ordering: false,
        // columnDefs: [{
        //         targets: [0, 1],
        //         searchable: true,
        //     },
        //         {
        //             targets: [2, 3, 4, 5],
        //             searchable: false,
        //         },
        //     ]
        // });

        //     $('#searchPok').on('keyup', function() {
        //         table.columns(2).search(this.value).draw();
        //     });
        // });
    </script>
    @endpush
</x-default-layout>