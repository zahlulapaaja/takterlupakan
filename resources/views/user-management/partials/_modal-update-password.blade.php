<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_update_password_{{$user->id}}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_password_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update Password</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_update_password_form" class="form" action="{{ route('user-management.users.update-password', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_update_password_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_password_header" data-kt-scroll-wrappers="#kt_modal_update_password_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="d-flex flex-row mb-2">
                            <span class="fw-semibold fs-6 min-w-100px">Full Name :</span>
                            <span class="fw-semibold fs-6">{{$user->name}}</span>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-row mb-2">
                            <span class="fw-semibold fs-6 min-w-100px">Email :</span>
                            <span class="fw-semibold fs-6">{{$user->email}}</span>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Password Baru</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="********" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->