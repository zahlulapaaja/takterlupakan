<!--begin::Header-->
<div id="kt_header" class="header">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-center flex-wrap justify-content-between" id="kt_header_container">
		@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/header/_title')
		@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/header/_mobile-toggle')
		<!--begin::Topbar-->
		<div class="d-flex align-items-center flex-shrink-0">
			<!-- include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/header/_search') -->
			<!-- include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/header/_activities') -->
			<!-- include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/header/_chat') -->
			@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/content-layout/header/_theme')
		</div>
		<!--end::Topbar-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->