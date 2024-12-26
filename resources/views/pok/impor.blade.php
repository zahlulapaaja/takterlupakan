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
            </div>
            <div class="card-body py-3">

                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('pok.prosesimpor') }}" method="POST" enctype="multipart/form-data" class="text-right">
                    @csrf
                    @method('POST')

                    <input type="number" name="tahun" class="form-control my-2" placeholder="Tahun...">
                    <input type="number" name="revisi" class="form-control my-2" placeholder="Revisi Ke...">

                    <div class="mb-3">
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