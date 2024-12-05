<!--begin::Sidebar-->
<div id="kt_aside" class="aside pt-7 pb-4 pb-lg-7 pt-lg-17" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
	@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/_brand')
	@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/_user')
	@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/_menu')
	@include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/sidebar/_footer')
</div>
<!--end::Sidebar-->