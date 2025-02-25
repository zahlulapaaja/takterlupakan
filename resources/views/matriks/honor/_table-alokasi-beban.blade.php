<!--begin::Label-->
<label class="form-label">Petugas</label>
<!--end::Label-->
<!--begin::Daftar Petugas dan Alokasi Beban-->
<div>
    <!--begin::Form group-->
    <div class="form-group">
        <div id="daftar-beban" class="d-flex flex-column gap-3">
            @foreach($list_petugas as $p)
            <div class="form-group d-flex flex-row gap-5">
                <!--begin::Input-->
                <input type="hidden" name="id_status[]" value="{{$p->id_status}}" />
                <input type="hidden" name="status[]" value="{{$p->status}}" />
                <input type="checkbox" class="form-check-input items-start mt-3" name="checkbox[]" value="{{$loop->index}}">
                <div class="w-full flex flex-column flex-lg-row gap-5">
                    <input type="text" class="form-control" name="petugas[]" value="{{$p->nama}}" readonly />
                    <input type="text" class="form-control" name="sebagai[]" value="{{$p->sebagai}}" placeholder="Sebagai" />
                    <div class="w-full flex flex-row gap-5">
                        <input type="number" class="form-control" name="harga[]" placeholder="Harga @" value="{{$pok->harga}}" required />
                        <input type="number" class="form-control" name="volume[]" placeholder="Volume" value="0" />
                        <span class="text-left text-lg my-auto">{{$pok->satuan}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!--end::Form group-->
</div>
<!--end::Daftar Petugas dan Alokasi Beban-->