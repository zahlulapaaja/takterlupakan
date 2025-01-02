<!--begin::Label-->
<label class="form-label">Petugas</label>
<!--end::Label-->
<!--begin::Daftar Petugas dan Alokasi Beban-->
<div>
    <!--begin::Form group-->
    <div class="form-group">
        <div id="daftar-beban" class="d-flex flex-column gap-3">
            @foreach($data->petugas as $p)
            <div class="form-group d-flex flex-column flex-lg-row gap-5">
                <!--begin::Input-->
                <input type="hidden" name="id_honor[]" value="{{$p->id}}" />
                @if($p->checkbox == 1)
                <input type="checkbox" class="form-check-input items-start mt-3" name="checkbox[]" value="{{$loop->index}}" checked>
                @else
                <input type="checkbox" class="form-check-input items-start mt-3" name="checkbox[]" value="{{$loop->index}}">
                @endif
                <div class="w-full w-lg-5/6 flex flex-column flex-lg-row gap-5">
                    <input type="text" class="form-control" name="petugas[]" value="{{$p->nama}}" readonly />
                    <div class="flex flex-row gap-5">
                        <input type="number" class="form-control" name="beban[]" placeholder="Beban" value="{{$p->beban}}" required />
                        <span class="text-left text-lg my-auto">{{$keg->pok->satuan}}</span>
                    </div>
                </div>
                <!--end::Input-->
            </div>
            @endforeach
        </div>
    </div>
    <!--end::Form group-->
</div>
<!--end::Daftar Petugas dan Alokasi Beban-->