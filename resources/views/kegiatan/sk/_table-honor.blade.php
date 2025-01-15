<table class="w-full border text-center font-medium mb-4">
    <thead>
        <tr>
            <th class="border border-black py-1 font-bold">No.</th>
            <th class="border border-black py-1 font-bold">Uraian</th>
            <th class="border border-black py-1 font-bold">Honor (Rp)</th>
        </tr>
        <tr class="text-sm font-thin">
            <td class="border border-black">(1)</td>
            <td class="border border-black">(2)</td>
            <td class="border border-black">(3)</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data->honor as $key => $h)
        <tr>
            <td class="border border-black">{{ $key+1 }}.</td>
            <td class="border border-black text-left min-w-300px pl-2">{{$h->uraian}}</td>
            <td class="border border-black">{{currency_IDR($h->honor)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>