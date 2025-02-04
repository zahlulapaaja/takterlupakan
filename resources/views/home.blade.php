<x-default-layout>

	@section('title')
	Home
	@endsection

	@section('breadcrumbs')
	{{Breadcrumbs::render('home')}}
	@endsection

	<!--begin::About card-->
	<div class="card">
		<!--begin::Body-->
		<div class="card-body p-lg-17">
			<!--begin::About-->
			<div class="mb-18">
				<!--begin::Wrapper-->
				<div class="mb-10">
					<!--begin::Top-->
					<div class="text-center mb-15">
						<!--begin::Title-->
						<h3 class="fs-2hx text-gray-900 mb-5">Selamat Datang</h3>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="fs-5 text-muted fw-semibold">Selamat datang di Sistem Informasi Rekam Arsip dan Administrasi BPS Kabupaten Aceh Barat
							atau Sirasaka. Semoga sistem ini memberikan manfaat bagi pengguna sekalian.
							<br />Sira dan saka bumbu kehidupan, tapi berlebihan bisa jadi ancaman.
						</div>
						<!--end::Text-->
					</div>
					<!--end::Top-->
					<!--begin::Overlay-->
					<div class="overlay">
						<!--begin::Image-->
						<img class="w-100 card-rounded" src="assets/media/stock/1600x800/img-5.jpg" alt="" />
						<!--end::Image-->
						<!--begin::Links-->
						<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
							<!-- <a href="pages/pricing.html" class="btn btn-primary">Pricing</a> -->
							<!-- <a href="pages/careers/apply.html" class="btn btn-light-primary ms-3">Join Us</a> -->
						</div>
						<!--end::Links-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Description-->
				<div class="fs-5 fw-semibold text-gray-600">
					<p class="text-justify mb-8">
						Puji syukur dipersembahkan ke hadirat Allah Subhanahu wa ta'ala, atas limpahan rahmatNya sehingga Tim BPS Aceh Barat mampu membangun
						aplikasi Sirasaka dengan baik. Selanjutnya saya sampaikan apresiasi setinggi-tingginya untuk Tim yang telah bekerja keras, bekerja cerdas
						membangun aplikasi ini dengan berbagai upaya dengan harapan dapat memberikan manfaat untuk BPS Aceh Barat yang lebih baik.
					</p>
					<p class="text-justify mb-8">
						Sirasaka merupakan jawaban atas berbagai kebutuhan dalam penyelenggaraan administrasi di BPS Kabupaten Aceh Barat. Aplikasi ini dibangun
						sebagai pelengkap dari aplikasi yang sudah ada yang diharapkan mempermudah pegawai BPS Kabupaten Aceh Barat dalam penatausahaan administrasi keuangan.
						Harapannya, semoga aplikasi ini dapat digunakan dengan optimal dalam menunjang kegiatan dan tertib administrasi di BPS Kabupaten Aceh Barat.
					</p>
					<p class="text-justify mb-8">
						Demikian, wassalamuala'ikum warahmatulloohi wabarakatuh.
					</p>
					<p class="text-justify mb-8 italic">
						~ Kepala BPS Kabupaten Aceh Barat
					</p>
				</div>
				<!--end::Description-->
			</div>
			<!--end::About-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::About card-->
</x-default-layout>