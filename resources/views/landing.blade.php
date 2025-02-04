<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic 
Product Version: 8.2.1
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<title>Selamat Datang - {{ config('app.name', 'Laravel') }}</title>
	<meta charset="utf-8" />
	<meta charset="utf-8" />
	<meta name="description" content="SIRASAKA - Sistem Informasi Rekam Arsip dan Administrasi BPS Kabupaten Aceh Barat. Kelola dokumen dan arsip secara digital dengan mudah, cepat, dan aman." />
	<meta name="keywords" content="SIRASAKA, aceh barat, bps, bps aceh barat, dokumen, Sistem Arsip Digital, Manajemen Dokumen, Administrasi BPS, Rekam Arsip, Pengelolaan Arsip" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="SIRASAKA - Sistem Informasi Rekam Arsip dan Administrasi BPS Kabupaten Aceh Barat." />
	<meta property="og:url" content="https://sirasaka.web.bps.go.id/" />
	<meta property="og:site_name" content="Sirasaka by Zedef" />
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="beranda" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Header Section-->
		<div class="mb-0" id="home">
			<!--begin::Wrapper-->
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
				<!--begin::Header-->
				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center justify-content-between">
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-equal">
								<!--begin::Mobile menu toggle-->
								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
									<i class="ki-duotone ki-abstract-14 fs-2hx">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</button>
								<!--end::Mobile menu toggle-->
								<!--begin::Logo image-->
								<a href="{{route('landing')}}">
									<img alt="Logo" src="assets/media/logos/default-dark.svg" class="logo-default h-25px h-lg-30px" />
									<img alt="Logo" src="assets/media/logos/default.svg" class="logo-sticky h-20px h-lg-25px" />
								</a>
								<!--end::Logo image-->
							</div>
							<!--end::Logo-->
							<!--begin::Menu wrapper-->
							<div class="d-lg-block" id="kt_header_nav_wrapper">
								<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#beranda', lg: '#kt_header_nav_wrapper'}">
									<!--begin::Menu-->
									<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#beranda" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#fitur" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Fitur</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#statistik" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Statistik</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pegawai" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Pegawai</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#galeri" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Galeri</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</div>
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Toolbar-->
							<div class="flex-equal text-end ms-1">
								<a href="{{route('login')}}" class="btn btn-success">Sign In</a>
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Landing hero-->
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<!--begin::Heading-->
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<!--begin::Title-->
						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Kelola Arsip Mudah, Kerja Lebih Cepat
							<br />dengan
							<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">Sirasaka</span>
							</span>
						</h1>
						<!--end::Title-->
						<!--begin::Action-->
						<a href="{{route('home')}}" class="btn btn-primary">Masuk</a>
						<!--end::Action-->
					</div>
					<!--end::Heading-->
					<!--begin::Clients-->
					<div class="d-flex flex-center flex-wrap position-relative px-5">
						<!--begin::Client-->
						<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="BPS Aceh Barat">
							<img src="assets/media/logos/bps.svg" class="mh-30px mh-lg-40px" alt="" />
						</div>
						<!--end::Client-->
					</div>
					<!--end::Clients-->
				</div>
				<!--end::Landing hero-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Header Section-->
		<!--begin::Fitur Section-->
		<div class="mb-n10 mb-lg-n20 z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-17">
					<!--begin::Title-->
					<h3 class="fs-2hx text-gray-900 mb-5" id="fitur" data-kt-scroll-offset="{default: 100, lg: 150}">Fitur</h3>
					<!--end::Title-->
					<!--begin::Text-->
					<div class="fs-5 text-muted fw-bold">Gunakan Sirasaka untuk mempermudah arsip dan dokumen di BPS Aceh Barat
						<br />Gunakan sira & saka untuk menambah rasa dalam masakan
					</div>
					<!--end::Text-->
				</div>
				<!--end::Heading-->
				<!--begin::Row-->
				<div class="row w-100 gy-10 mb-md-20">
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="assets/media/illustrations/dozzy-1/2.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
								<!--end::Badge-->
								<!--begin::Title-->
								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">POK</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Kelola POK dengan rapi
								<br />dan memudahkan
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="assets/media/illustrations/dozzy-1/8.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
								<!--end::Badge-->
								<!--begin::Title-->
								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Dokumen</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Mari menghemat waktu dengan
								<br />mencetak dokumen secara otomatis
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="assets/media/illustrations/dozzy-1/12.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
								<!--end::Badge-->
								<!--begin::Title-->
								<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Matriks</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold fs-6 fs-lg-4 text-muted">Permudah pencetakan SPK dan
								<br />BAST mitra dengan Sirasaka
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Product slider-->
				<div class="tns tns-default">
					<!--begin::Slider-->
					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#pegawai_slider_prev1" data-tns-next-button="#pegawai_slider_next1">
						<!--begin::Item-->
						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo1/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo2/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo4/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
							<img src="assets/media/preview/demos/demo5/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
						</div>
						<!--end::Item-->
					</div>
					<!--end::Slider-->
					<!--begin::Slider button-->
					<button class="btn btn-icon btn-active-color-primary" id="pegawai_slider_prev1">
						<i class="ki-duotone ki-left fs-2x"></i>
					</button>
					<!--end::Slider button-->
					<!--begin::Slider button-->
					<button class="btn btn-icon btn-active-color-primary" id="pegawai_slider_next1">
						<i class="ki-duotone ki-right fs-2x"></i>
					</button>
					<!--end::Slider button-->
				</div>
				<!--end::Product slider-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Fitur Section-->
		<!--begin::Statistics Section-->
		<div class="mt-sm-n10">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="pb-15 pt-18 landing-dark-bg">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mt-15 mb-18" id="statistik" data-kt-scroll-offset="{default: 100, lg: 150}">
						<!--begin::Title-->
						<h3 class="fs-2hx text-white fw-bold mb-5">Apa Saja Yang Ada Di Aceh Barat</h3>
						<!--end::Title-->
						<!--begin::Description-->
						<div class="fs-5 text-gray-700 fw-bold">Takar sira dan saka untuk kenikmatan makanan
							<br />Takar data untuk mendapat manfaat kebijakan
						</div>
						<!--end::Description-->
					</div>
					<!--end::Heading-->
					<!--begin::Statistics-->
					<div class="d-flex flex-center">
						<!--begin::Items-->
						<div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
							<!--begin::Item-->
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<!--begin::Symbol-->
								<i class="ki-duotone ki-element-11 fs-2tx text-white mb-3">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
								<!--end::Symbol-->
								<!--begin::Info-->
								<div class="mb-0">
									<!--begin::Value-->
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="12" data-kt-countup-suffix="">0</div>
									</div>
									<!--end::Value-->
									<!--begin::Label-->
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Kecamatan</span>
									<!--end::Label-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<!--begin::Symbol-->
								<i class="ki-duotone ki-chart-pie-4 fs-2tx text-white mb-3">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
								</i>
								<!--end::Symbol-->
								<!--begin::Info-->
								<div class="mb-0">
									<!--begin::Value-->
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="321" data-kt-countup-suffix="">0</div>
									</div>
									<!--end::Value-->
									<!--begin::Label-->
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Desa</span>
									<!--end::Label-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
								<!--begin::Symbol-->
								<i class="ki-duotone ki-map fs-2tx text-white mb-3">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
								<!--end::Symbol-->
								<!--begin::Info-->
								<div class="mb-0">
									<!--begin::Value-->
									<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
										<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="1034" data-kt-countup-suffix="">0</div>
									</div>
									<!--end::Value-->
									<!--begin::Label-->
									<span class="text-gray-600 fw-semibold fs-5 lh-0">Dusun</span>
									<!--end::Label-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Items-->
					</div>
					<!--end::Statistics-->
					<!--begin::Testimonial-->
					<div class="fs-2 fw-semibold text-muted text-center mb-3">
						<span class="fs-1 lh-1 text-gray-700">“</span>
						Beungoh singoh geutanyoe jep kupi di keude Meulaboh
						<br />atawa ulon akan syahid
						<span class="fs-1 lh-1 text-gray-700">“</span>
					</div>
					<!--end::Testimonial-->
					<!--begin::Author-->
					<div class="fs-2 fw-semibold text-muted text-center">
						<span class="fs-4 fw-bold text-gray-600">~ Teuku Umar</span>
					</div>
					<!--end::Author-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Statistics Section-->
		<!--begin::Pegawai Section-->
		<div class="py-10 py-lg-20">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-12">
					<!--begin::Title-->
					<h3 class="fs-2hx text-gray-900 mb-5" id="pegawai" data-kt-scroll-offset="{default: 100, lg: 150}">Pegawai Kami</h3>
					<!--end::Title-->
					<!--begin::Sub-title-->
					<div class="fs-5 text-muted fw-bold">Membangun dengan data 📊, Melayani dengan hati ❤️
					</div>
					<!--end::Sub-title=-->
				</div>
				<!--end::Heading-->
				<!--begin::Slider-->
				<div class="tns tns-default" style="direction: ltr">
					<!--begin::Wrapper-->
					<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#pegawai_slider_prev" data-tns-next-button="#pegawai_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
						@forelse($pegawai as $p)
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<?php $avatar = $p->avatar ? asset('uploads/pegawai/' . $p->avatar) : asset('uploads/pegawai/blank.png'); ?>
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{$avatar}}')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">{{$p->nama}}</a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="text-muted fs-6 fw-semibold mt-1">{{$p->jabatan}}</div>
								<!--begin::Position-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						@empty
						<!--begin::Item-->
						<div class="text-center">
							<!--begin::Photo-->
							<?php $avatar = asset('uploads/pegawai/blank.png'); ?>
							<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('{{$avatar}}')"></div>
							<!--end::Photo-->
							<!--begin::Person-->
							<div class="mb-0">
								<!--begin::Name-->
								<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Tidak ditemukan data</a>
								<!--end::Name-->
							</div>
							<!--end::Person-->
						</div>
						<!--end::Item-->
						@endforelse
					</div>
					<!--end::Wrapper-->
					<!--begin::Button-->
					<button class="btn btn-icon btn-active-color-primary" id="pegawai_slider_prev">
						<i class="ki-duotone ki-left fs-2x"></i>
					</button>
					<!--end::Button-->
					<!--begin::Button-->
					<button class="btn btn-icon btn-active-color-primary" id="pegawai_slider_next">
						<i class="ki-duotone ki-right fs-2x"></i>
					</button>
					<!--end::Button-->
				</div>
				<!--end::Slider-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Pegawai Section-->
		<!--begin::Projects Section-->
		<div class="mb-lg-n15 position-relative z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Card-->
				<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
					<!--begin::Card body-->
					<div class="card-body p-lg-20">
						<!--begin::Heading-->
						<div class="text-center mb-5 mb-lg-10">
							<!--begin::Title-->
							<h3 class="fs-2hx text-gray-900 mb-5" id="galeri" data-kt-scroll-offset="{default: 100, lg: 250}">Galeri</h3>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Tabs wrapper-->
						<div class="d-flex flex-center mb-5 mb-lg-15">
							<!--begin::Tabs-->
							<ul class="nav border-transparent flex-center fs-5 fw-bold">
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#" data-bs-toggle="tab" data-bs-target="#galeri_kantor">Kantor</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#galeri_pegawai">Pegawai</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#galeri_kegiatan">Kegiatan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#galeri_kerjasama">Kerja Sama</a>
								</li>
							</ul>
							<!--end::Tabs-->
						</div>
						<!--end::Tabs wrapper-->
						<!--begin::Tabs content-->
						<div class="tab-content">
							<!--begin::Tab pane-->
							<div class="tab-pane fade show active" id="galeri_kantor">
								<!--begin::Row-->
								<div class="row g-10">
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Item-->
										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-90.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-90.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Row-->
										<div class="row g-10 mb-10">
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-91.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-91.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-92.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-92.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Item-->
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-82.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-82.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Tab pane-->
							<!--begin::Tab pane-->
							<div class="tab-pane fade" id="galeri_pegawai">
								<!--begin::Row-->
								<div class="row g-10">
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Item-->
										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-83.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x400/img-83.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Row-->
										<div class="row g-10 mb-10">
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-84.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-84.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-85.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-85.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Item-->
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-86.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-86.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Tab pane-->
							<!--begin::Tab pane-->
							<div class="tab-pane fade" id="galeri_kegiatan">
								<!--begin::Row-->
								<div class="row g-10">
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Row-->
										<div class="row g-10 mb-10">
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-87.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-87.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-88.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-88.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Item-->
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-89.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-89.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Item-->
										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-90.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x400/img-90.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Tab pane-->
							<!--begin::Tab pane-->
							<div class="tab-pane fade" id="galeri_kerjasama">
								<!--begin::Row-->
								<div class="row g-10">
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Item-->
										<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-91.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x400/img-91.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-lg-6">
										<!--begin::Row-->
										<div class="row g-10 mb-10">
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-94.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-94.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-lg-6">
												<!--begin::Item-->
												<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-92.png">
													<!--begin::Image-->
													<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-92.png')"></div>
													<!--end::Image-->
													<!--begin::Action-->
													<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
														<i class="ki-duotone ki-eye fs-3x text-white">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</div>
													<!--end::Action-->
												</a>
												<!--end::Item-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Item-->
										<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-93.png">
											<!--begin::Image-->
											<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x400/img-93.png')"></div>
											<!--end::Image-->
											<!--begin::Action-->
											<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
												<i class="ki-duotone ki-eye fs-3x text-white">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</div>
											<!--end::Action-->
										</a>
										<!--end::Item-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Tab pane-->
						</div>
						<!--end::Tabs content-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Projects Section-->
		<!--begin::Testimonials Section-->
		<div class="mt-20 mb-n20 pt-20 pb-20 position-relative z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-17">
					<!--begin::Title-->
					<h3 class="fs-2hx text-gray-900 mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">Kata Sambutan</h3>
					<!--end::Title-->
					<!--begin::Description-->
					<!-- <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
						<br />for different amazing and great useful admin
					</div> -->
					<!--end::Description-->
				</div>
				<!--end::Heading-->
				<!--begin::Row-->
				<div class="row g-lg-10 mb-10 mb-lg-20">
					<!--begin::Col-->
					<div class="col-lg-8 mx-auto text-center">
						<!--begin::Testimonial-->
						<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
							<!--begin::Wrapper-->
							<div class="mb-7">
								<!--begin::Feedback-->
								<div class="text-gray-500 fw-semibold fs-4">
									Sirasaka merupakan jawaban atas berbagai kebutuhan dalam penyelenggaraan administrasi di BPS Kabupaten Aceh Barat. Aplikasi ini dibangun
									sebagai pelengkap dari aplikasi yang sudah ada yang diharapkan mempermudah pegawai BPS Kabupaten Aceh Barat dalam penatausahaan administrasi keuangan.
								</div>
								<!--end::Feedback-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Author-->
							<div class="d-flex align-items-center justify-center mx-auto">
								<!--begin::Avatar-->
								<div class="symbol symbol-circle symbol-50px me-5">
									<img src="assets/media/avatars/pak-rudi.png" class="" alt="" />
								</div>
								<!--end::Avatar-->
								<!--begin::Name-->
								<div class="">
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Rudi Hermanto, SST., M.Si</a>
									<span class="text-muted d-block fw-bold">Kepala BPS Aceh Barat</span>
								</div>
								<!--end::Name-->
							</div>
							<!--end::Author-->
						</div>
						<!--end::Testimonial-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Testimonials Section-->
		<!--begin::Footer Section-->
		<div class="mb-0">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="landing-dark-bg pt-20">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Row-->
					<div class="row py-10 py-lg-20">
						<!--begin::Col-->
						<div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
							<!--begin::Block-->
							<div class="rounded landing-dark-border p-9 mb-10">
								<h2 class="text-white">Apakah ada yang ingin disampaikan?</h2>
								<span class="fw-normal fs-4 text-gray-700">Email kami ke
									<a href="mailto:bps1107@bps.go.id" class="text-white opacity-50 text-hover-primary">bps1107@bps.go.id</a>
								</span>
							</div>
							<!--end::Block-->
							<!--begin::Block-->
							<!-- <div class="rounded landing-dark-border p-9">
								<h2 class="text-white">How About a Custom Project?</h2>
								<span class="fw-normal fs-4 text-gray-700">Use Our Custom Development Service.
									<a href="pages/user-profile/overview.html" class="text-white opacity-50 text-hover-primary">Click to Get a Quote</a></span>
							</div> -->
							<!--end::Block-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-lg-6 ps-lg-16">
							<!--begin::Navs-->
							<div class="d-flex justify-content-center">
								<!--begin::Links-->
								<div class="d-flex fw-semibold flex-column me-20">
									<!--begin::Subtitle-->
									<h4 class="fw-bold text-gray-500 mb-6">Tautan Lainnya</h4>
									<!--end::Subtitle-->
									<!--begin::Link-->
									<a href="https://acehbaratkab.bps.go.id/id" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Website</a>
									<a href="https://s.bps.go.id/portal1107" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Portal</a>
									<a href="https://serasi.web.bps.go.id/" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Serasi</a>
									<!--end::Link-->
								</div>
								<!--end::Links-->
								<!--begin::Links-->
								<div class="d-flex fw-semibold flex-column ms-lg-20">
									<!--begin::Subtitle-->
									<h4 class="fw-bold text-gray-500 mb-6">Media Sosial</h4>
									<!--end::Subtitle-->
									<!--begin::Link-->
									<a href="https://www.instagram.com/bps.kab.acehbarat/" class="mb-6">
										<img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
									</a>
									<a href="https://api.whatsapp.com/send?phone=6285135880576&text=Hai" class="mb-6">
										<img src="assets/media/svg/brand-logos/whatsapp.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Whatsapp</span>
									</a>
									<a href="https://www.youtube.com/@bps.kab.acehbarat" class="mb-6">
										<img src="assets/media/svg/brand-logos/youtube-play.svg" class="h-20px me-2" alt="" />
										<span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Youtube</span>
									</a>
									<!--end::Link-->
								</div>
								<!--end::Links-->
							</div>
							<!--end::Navs-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Container-->
				<!--begin::Separator-->
				<div class="landing-dark-separator"></div>
				<!--end::Separator-->
				<!--begin::Container-->
				<div class="container">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
						<!--begin::Copyright-->
						<div class="d-flex align-items-center order-2 order-md-1 gap-5">
							<!--begin::Logo-->
							<a href="{{route('landing')}}">
								<img alt="Logo" src="assets/media/logos/default-dark.svg" class="h-15px h-md-20px" />
							</a>
							<!--end::Logo image-->
							<!--begin::Logo image-->
							<a href="https://acehbaratkab.bps.go.id/">
								<img alt="Logo" src="assets/media/logos/bps.svg" class="h-15px h-md-20px" />
							</a>
							<!--end::Logo image-->
						</div>
						<!--end::Copyright-->
						<!--begin::Menu-->
						<ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
							<li class="menu-item">
								<a href="https://acehbaratkab.bps.go.id/" target="_blank" class="menu-link px-2">Website</a>
							</li>
							<li class="menu-item mx-5">
								<a href="https://s.bps.go.id/portal1107" target="_blank" class="menu-link px-2">Portal</a>
							</li>
							<li class="menu-item">
								<a href="https://www.instagram.com/bps.kab.acehbarat/" target="_blank" class="menu-link px-2">Instagram</a>
							</li>
						</ul>
						<!--end::Menu-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Footer Section-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
	<!--end::Scrolltop-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="assets/js/custom/landing.js"></script>
	<script src="assets/js/custom/pages/pricing/general.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>