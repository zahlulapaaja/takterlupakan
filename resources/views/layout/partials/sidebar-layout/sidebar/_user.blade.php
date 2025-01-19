<!--begin::Aside user-->
<div class="aside-user mb-5 mb-lg-10" id="kt_aside_user">

	<!--begin::User-->
	<div class="d-flex align-items-center flex-column">
		<!--begin::Symbol-->
		<div class="symbol symbol-75px mb-4">
			<img src="{{ avatar(session('avatar')) }}" alt="Avatar" class="object-cover object-top bg-red-400" />
		</div>
		<!--end::Symbol-->
		<!--begin::Info-->
		<div class="text-center">
			<!--begin::Username-->
			<a href="pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-4 fw-bolder">{{ session('name') }}</a>
			<!--end::Username-->
			<!--begin::Description-->
			<span class="capitalize text-gray-600 fw-semibold d-block fs-7 mb-1">
				@foreach(session('role') as $r)
				@if (!($loop->first)) | @endif
				{{ $r->name }}
				@endforeach
			</span>
			<!--end::Description-->
		</div>
		<!--end::Info-->
	</div>
	<!--end::User-->
</div>
<!--end::Aside user-->