<table class="w-full border text-center font-medium mb-4">
    <thead>
        <tr>
            <th class="border border-black py-4 font-bold">No.</th>
            <th class="border border-black py-4 font-bold">Uraian</th>
            <th class="border border-black py-4 font-bold">Jumlah (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data->petugas as $d)
        <tr>
            <td class="border border-black py-2">{{ $loop->index+1 }}.</td>
            <td class="border border-black py-2 text-left min-w-300px pl-2">
                Transport Lokal {{$d->byk_kunj}} {{$keg->pok->satuan}} x @ {{currency_IDR($d->nominal/$d->byk_kunj)}}
            </td>
            <td class="border border-black py-2">{{currency_IDR($d->nominal)}},-</td>
        </tr>
        @endforeach
    </tbody>
</table>