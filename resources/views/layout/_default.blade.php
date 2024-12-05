@extends('layout.master')
@section('content')
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid">
		@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_sidebar')
		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/_header')
			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Container-->
				<div class="container-fluid" id="kt_content_container">
					{{$slot}}
				</div>
				<!--end::Container-->
			</div>
			<!--end::Content-->
			@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/_footer')
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
<!--end::Root-->
@include('components/_drawers')
@include('components/_scrolltop')
@include('components/_modals')

<!--end::Main-->
@endsection