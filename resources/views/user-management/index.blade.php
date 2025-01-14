<x-default-layout>

    @section('title')
    User Management
    @endsection

    @section('breadcrumbs')
    {{Breadcrumbs::render('user-management.users.index')}}
    @endsection

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input id="searchUser" type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Search user.." />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Export-->
                    <a href="#" class="btn btn-light-primary me-3">
                        <i class="ki-duotone ki-exit-up fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Export</a>
                    <!--end::Export-->
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                        <i class="ki-duotone ki-plus fs-2"></i>Add User</button>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
                @include('user-management.partials._modal-add-user')
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">User</th>
                        <th class="min-w-125px">Role</th>
                        <th class="min-w-125px">Joined Date</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @forelse($users as $user)
                    <tr id="{{$user->id}}">
                        <td class="d-flex align-items-center h-full">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="{{ route('user-management.users.show', $user->id) }}">
                                    <div class="symbol-label">
                                        <img src="{{avatar($user->image)}}" alt="{{$user->name}}" class="w-100" />
                                    </div>
                                </a>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::User details-->
                            <div class="d-flex flex-column">
                                <a href="{{ route('user-management.users.show', $user->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                <span>{{ $user->email }}</span>
                            </div>
                            <!--begin::User details-->
                        </td>
                        <td>
                            @foreach($user->roles as $role)
                            @if(!($loop->first))
                            <br>
                            @endif
                            <div class="badge badge-light-primary fw-bold">{{$role->name}}</div>
                            @endforeach
                        </td>
                        <td>
                            <span class="text-nowrap">{{date_indo($user->created_at)}}</span>
                        </td>
                        <td class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary btn-active-primary btn-flex btn-center btn-sm mx-1 my-2" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user_{{$user->id}}">Edit</a>
                            <a href="#" data-id="{{$user->id}}" data-name="{{$user->name}}" class="btn btn-danger btn-active-danger-primary btn-flex btn-center btn-sm mx-1 my-2 modal-delete">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @include('user-management.partials._modal-edit-user')
                    @empty
                    <tr>
                        <td colspan="4">No Data Found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let table = $('#kt_table_users').DataTable({
                processing: true,
                "bDestroy": true,
            });

            $('#searchUser').on('keyup', function() {
                table.search(this.value).draw();
            });

            $(document.body).on('click', '.modal-delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Show confirmation popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Anda yakin ingin menghapus user " + name + " ?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.value) {
                        var url = "{{route('user-management.users.destroy',':id')}}";
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: {
                                _token: '{{csrf_token()}}',
                            },
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire({
                                        text: "User berhasil dihapus",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-success",
                                        }
                                    });

                                    table.rows("#" + id + "").remove().draw();
                                }
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        modal.hide(); // Hide modal				
                    }
                });
            });

        });
    </script>
    @endpush
</x-default-layout>