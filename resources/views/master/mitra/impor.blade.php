<x-default-layout>

    @section('title')
    Impor Mitra
    @endsection

    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Form Import Mitra Tahun {{$last_tahun}}</span>
                    <!-- <span class="text-muted mt-1 fw-semibold fs-7">Selamat mengerjakan</span> -->
                </h3>

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