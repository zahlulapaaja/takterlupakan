<!--begin::Label-->
<label class="form-label">Petugas</label>
<!--end::Label-->
<!--begin::Daftar Petugas dan Alokasi Beban-->
<div>
    @if($akun === config('constants.AKUN_HONOR'))

    <!--begin::Form group-->
    <div class="form-group">
        <div id="daftar-beban" class="d-flex flex-column gap-3">
            @foreach($list_petugas as $p)
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

    @else

    <!--begin::Form group-->
    <div class="form-group">
        <div id="daftar-beban" class="d-flex flex-column gap-3">
            @foreach($list_petugas as $p)
            <div class="form-group d-flex flex-column flex-lg-row gap-5">
                <!--begin::Input-->
                <input type="hidden" name="id_translok[]" value="{{$p->id}}" />
                <input type="text" class="form-control w-full w-lg-1/6" name="petugas[]" value="{{$p->nama}}" readonly />
                <span class="d-flex flex-row w-full w-lg-1/6">
                    <input type="number" class="form-control" name="byk_kunj[]" placeholder="Byk Kunj..." value="{{$p->byk_kunj}}" required />
                    <span class="text-left text-lg my-auto text-nowrap mx-1">{{$keg->pok->satuan}}</span>
                </span>
                <input type="text" class="form-control w-full w-lg-1/6" name="melakukan[]" placeholder="Melakukan" value="{{$p->melakukan}}" required />
                <input type="text" class="form-control w-full w-lg-1/6" name="lokasi[]" placeholder="Lokasi" value="{{$p->lokasi}}" required />
                <input type="text" class="form-control w-full w-lg-1/6" name="tgl_kunj[]" placeholder="Tgl Kunj" value="{{$p->tgl_kunj}}" required />
                <input type="number" class="form-control w-full w-lg-1/6" name="nominal[]" placeholder="Realisasi" value="{{$p->nominal}}" required />
                <!--end::Input-->
            </div>
            @endforeach
        </div>
    </div>
    <!--end::Form group-->

    @endif
</div>
<!--end::Daftar Petugas dan Alokasi Beban-->