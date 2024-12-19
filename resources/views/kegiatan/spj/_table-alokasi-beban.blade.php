<!--begin::Label-->
<label class="form-label">Petugas</label>
<!--end::Label-->
<!--begin::Daftar Petugas dan Alokasi Beban-->
<div>
    <!--begin::Form group-->
    <div class="form-group">
        <div id="daftar-beban" class="d-flex flex-column gap-3">
            @foreach($list_petugas as $p)
            <div class="form-group d-flex flex-column flex-lg-row gap-5">
                <!--begin::Input-->
                <input type="hidden" name="id_status[]" value="{{$p->id_status}}" />
                <input type="hidden" name="status[]" value="{{$p->status}}" />
                <input type="text" class="form-control w-full w-lg-3/6" name="petugas[]" value="{{$p->nama}}" readonly />
                <input type="text" class="form-control w-full w-lg-1/6" name="beban[]" placeholder="Beban" required />
                <input type="text" class="form-control w-full w-lg-1/6" name="melakukan[]" placeholder="Melakukan" required />
                <input type="text" class="form-control w-full w-lg-1/6" name="lokasi[]" placeholder="Lokasi" required />
                <!--end::Input-->
            </div>
            @endforeach
        </div>
    </div>
    <!--end::Form group-->
</div>
<!--end::Daftar Petugas dan Alokasi Beban-->