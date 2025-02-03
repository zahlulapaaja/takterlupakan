<x-default-layout>

    @section('title')
    Impor POK
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('pok.impor') }}
    @endsection

    <div class="container">
        <div class="card mt-3">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Form Import POK</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">{{config('constants.SATKER')}}</span>
                </h3>

                <div class="card-toolbar">
                    <a href="{{route('pok.template')}}" class="btn btn-sm btn-light btn-active-primary me-2">
                        <i class="ki-document ki-solid fs-2"></i>Template</a>
                </div>
            </div>
            <div class="card-body py-3">

                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <!-- begin::alert -->
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">Perhatian</p>
                    <p>Download template POK di Aplikasi Back Office.</p>
                    <p>BackOffice >> Anggaran >> Report POK >> Download Excel</p>
                </div>
                <!-- end::alert -->

                <form action="{{ route('pok.prosesimpor') }}" method="POST" enctype="multipart/form-data" class="text-right">
                    @csrf
                    @method('POST')

                    <input type="number" name="tahun" class="form-control my-2" placeholder="Tahun..." required>
                    <input type="number" name="revisi" class="form-control my-2" placeholder="Revisi Ke..." required>

                    <div class="mb-3 text-left">
                        <input class="form-control" type="file" id="file" name="file" required>
                        @error('file')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>

</x-default-layout>