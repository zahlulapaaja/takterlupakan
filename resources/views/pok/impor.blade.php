<x-default-layout>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h1>Form import excel</h1>
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('pok.prosesimpor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <input type="number" name="tahun" class="form-control" placeholder="Tahun...">
                    <input type="number" name="revisi" class="form-control" placeholder="Revisi Ke...">

                    <div class="mb-3">
                        <label for="file" class="form-label">File excel</label>
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