<x-default-layout>

    @section('title')
    Matriks
    @endsection

    @section('breadcrumbs')
    {{Breadcrumbs::render('matriks.honor.list', [$tahun,date_indo_bulan($bulan)])}}
    @endsection

    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Matriks Honor [{{date_indo_bulan($bulan)}} {{$tahun}}]</span>
                <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
            </h3>
            <div class="card-toolbar">
                @role('administrator|ppk')
                <div id="btn-rapikan-nomor" href="#" data-tahun="{{$tahun}}" data-bulan="{{$bulan}}" class="btn btn-sm btn-light btn-active-primary me-2">
                    <i class="ki-arrows-loop ki-solid fs-2"></i>Rapikan Nomor
                </div>
                @endrole
                <a id="modal-no-spk" href="#" data-tahun="{{$tahun}}" data-bulan="{{$bulan}}" class="btn btn-sm btn-light btn-active-primary me-2">
                    <i class="ki-document ki-solid fs-2"></i>SPK</a>
                <a href="{{route('matriks.honor.bast.print', [$tahun, $bulan])}}" class="btn btn-sm btn-light btn-active-primary me-2" target="_blank">
                    <i class="ki-document ki-solid fs-2"></i>BAST</a>
                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Input Honor Dari Kegiatan">
                    <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-light btn-active-primary">
                        <i class="ki-duotone ki-plus fs-2"></i>Tambah
                    </a>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Compact form-->
                <div class="d-flex align-items-center mb-4">
                    <div class="w-full d-flex flex-column flex-lg-row justify-between gap-y-3">
                        <!--begin::Input group-->
                        <div class="position-relative w-md-400px me-md-2">
                            <i class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input id="searchData" type="text" class="form-control form-control-solid ps-10" placeholder="Search" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Compact form-->
                    <div class="flex flex-row gap-3">
                        <select id="tim" class="form-control text-center">
                            <option value="">-- Tim --</option>
                            @foreach($list_tim as $t)
                            <option value="{{$t->singkatan}}">{{$t->singkatan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- begin::alert -->
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">Perhatian</p>
                    <p>Perhatikan nomor urut bast dengan baik.</p>
                    <p>Limit honor akumulasi
                        <?php $text = '<span class="text-nowrap">' .
                            'Pendataan Survei: ' . config('constants.LIMIT_HONOR_PENDATAAN_SURVEI') . '<br>' .
                            'Pemeriksaan Survei: ' . config('constants.LIMIT_HONOR_PEMERIKSAAN_SURVEI') . '<br>' .
                            'Pengolahan Survei: ' . config('constants.LIMIT_HONOR_PENGOLAHAN_SURVEI') . '<br>' .
                            'Pendataan Sensus: ' . config('constants.LIMIT_HONOR_PENDATAAN_SENSUS') . '<br>' .
                            'Pemeriksaan Sensus: ' . config('constants.LIMIT_HONOR_PEMERIKSAAN_SENSUS') . '<br>' .
                            'Pengolahan Sensus: ' . config('constants.LIMIT_HONOR_PENGOLAHAN_SENSUS') . '<br>' .
                            'Pengawasan Olah Sensus: ' . config('constants.LIMIT_HONOR_PENGAWASAN_OLAH_SENSUS') .
                            '</span>';
                        ?>
                        <span class="ms-1" data-bs-toggle="tooltip" data-bs-html="true" title="{{$text}}">
                            <i class="ki-duotone ki-information fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </p>
                </div>
                <!-- end::alert -->

                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 datatable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted ">
                            <th class="min-25px">BAST</th>
                            <th class="min-w-200px">Kegiatan</th>
                            <th class="min-w-50px">Nama</th>
                            <th class="min-w-50px">Sebagai</th>
                            <th class="min-w-50px">Harga<br>Satuan</th>
                            <th class="min-w-50px">Vol</th>
                            <th class="min-w-75px">Akumulasi</th>
                            <th class="min-w-75px">Tanggal BAST</th>
                            <th class="min-w-50px">Tim</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($data as $d)
                        <tr id="{{$d->id}}" class="hover:bg-blue-200">
                            <td class="text-gray-900 fs-6 text-nowrap">{{$d->no_bast}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{Str::limit($d->nama_keg, 75)}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">
                                @if($d->honor_akumulasi > config('constants.LIMIT_HONOR_UMUM'))
                                <span class="bg-red-300" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Cek kembali limitnya">{{$d->nama}}</span>
                                @else
                                {{$d->nama}}
                                @endif
                            </td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{$d->sebagai}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{$d->harga}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{$d->volume}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{currency_IDR($d->honor_akumulasi)}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{$d->tgl_bast}}</td>
                            <td class="text-gray-900 fs-6 text-nowrap">{{$d->nama_tim}}</td>
                            <td class="p-0">
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="{{ route('matriks.honor.bast', $d->id) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="BAST">
                                        <button type="submit">
                                            <i class="ki-duotone ki-printer fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </button>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_honor_{{$d->id}}">
                                        <i class="ki-duotone ki-pencil fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <a href="#" data-id="{{$d->id}}" data-name="{{$d->nama}} - {{$d->nama_keg}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-delete">
                                        <i class="ki-duotone ki-trash fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @include('matriks.honor._modal-edit-honor')
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let table = $('.datatable').DataTable({
                processing: true,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: 9
                }],
                "bDestroy": true,
            });

            $('#searchData').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#tim').on('change', function() {
                var selectedTim = $(this).val();
                table.columns(8).search(selectedTim).draw();
            });

            // modal untuk input angka no spk
            $(document.body).on('click', '#modal-no-spk', function(e) {
                e.preventDefault();
                var tahun = $(this).data('tahun');
                var bulan = $(this).data('bulan');

                Swal.fire({
                    title: "Cetak SPK!",
                    text: "Masukkan nomor awal SPK:",
                    input: "number",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "1"
                }).then(function(input) {
                    alert(tahun);
                    if (input.value == undefined) { // jika cancel
                        return false;
                    } else if (input.value == "") { // jika kosong
                        Swal.fire("You need to write something!");
                        return false;
                    } else {
                        var url = "{{route('matriks.honor.spk.print', [':tahun', ':bulan', ':no'])}}";
                        url = url.replace(':tahun', tahun);
                        url = url.replace(':bulan', bulan);
                        url = url.replace(':no', input.value);
                        window.open(url, "_blank");
                        return false;
                    }
                });
            });

            $(document.body).on('click', '.modal-delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Show confirmation popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Anda yakin ingin menghapus data " + name + " ?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.value) {
                        var url = "{{route('matriks.honor.destroy',':id')}}";
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: {
                                _token: '{{csrf_token()}}',
                            },
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire({
                                        text: "Data berhasil dihapus",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-success",
                                        }
                                    });

                                    table.rows("#" + id + "").remove().draw();
                                }
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        modal.hide(); // Hide modal				
                    }
                });
            });

            $('#btn-rapikan-nomor').on('click', function() {
                let tahun = $(this).data('tahun');
                let bulan = $(this).data('bulan');

                if (!confirm('Yakin ingin merapikan nomor?')) return;

                $.ajax({
                    url: "{{ route('matriks.rapikan.nomor.bast') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        tahun: tahun,
                        bulan: bulan
                    },
                    beforeSend: function() {
                        $('#btn-rapikan-nomor').prop('disabled', true);
                    },
                    success: function(res) {
                        if (res.status) {
                            // table.ajax.reload(null, false); // 🔥 refresh DataTable
                            location.reload();
                        }
                        alert(res.message);
                    },
                    error: function() {
                        alert('Terjadi kesalahan');
                    },
                    complete: function() {
                        $('#btn-rapikan-nomor').prop('disabled', false);
                    }
                });
            });

        });
    </script>
    @endpush
</x-default-layout>