<x-default-layout>

    @section('title')
    Master
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('master.mitra.impor') }}
    @endsection

    <div class="container">
        <div class="card mt-3">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Form Import Mitra Tahun {{$last_tahun}}</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{route('master.mitra.template')}}" class="btn btn-sm btn-light btn-active-primary me-2">
                        <i class="ki-document ki-solid fs-2"></i>Template</a>
                </div>
            </div>
            <div class="card-body py-3">

                <!-- begin::alert -->
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">Perhatian</p>
                    <p>Download template mitra di Aplikasi Manajemen Mitra.</p>
                    <p>Manajemen Mitra >> Mitra >> Mitra Kepka >> Download</p>
                    <p>Pastikan menambah tiga kolom tambahan (nomor rekening, nama bank, nama pemilik rekening).</p>
                </div>
                <!-- end::alert -->

                <form action="{{ route('master.mitra.prosesimpor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="tahun" value="{{$last_tahun}}">

                    <div class="mt-8 mb-3">
                        <input class="form-control" type="file" id="file" name="file" required>
                        @error('file')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>