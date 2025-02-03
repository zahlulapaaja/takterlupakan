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
					<!--begin::Text-->
					<p class="italic">(kata sambutan bapak kalo ada)</p>
					<!-- <p class="mb-8">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words per minute and your writing skills are sharp. From the seed of the idea to finally hitting “Publish,” you might spend several days or maybe even a week “writing” a blog post, but it’s important to spend those vital hours planning your post and even thinking about
						<a href="pages/blog/post.html" class="link-primary pe-1">Your Post</a>(yes, thinking counts as working if you’re a blogger) before you actually write it.
					</p> -->
					<!--end::Text-->
					<!--begin::Text-->
					<!-- <p class="mb-8">There’s an old maxim that states,
						<span class="text-gray-800 pe-1">“No fun for the writer, no fun for the reader.”</span>No matter what industry you’re working in, as a blogger, you should live and die by this statement.
					</p> -->
					<!--end::Text-->
					<!--begin::Text-->
					<!-- <p class="mb-8">Before you do any of the following steps, be sure to pick a topic that actually interests you. Nothing – and
						<a href="pages/blog/home.html" class="link-primary pe-1">I mean NOTHING</a>– will kill a blog post more effectively than a lack of enthusiasm from the writer. You can tell when a writer is bored by their subject, and it’s so cringe-worthy it’s a little embarrassing.
					</p> -->
					<!--end::Text-->
					<!--begin::Text-->
					<!-- <p class="mb-17">I can hear your objections already. “But Dan, I have to blog for a cardboard box manufacturing company.” I feel your pain, I really do. During the course of my career, I’ve written content for dozens of clients in some less-than-thrilling industries (such as financial regulatory compliance and corporate housing), but the hallmark of a professional blogger is the ability to write well about any topic, no matter how dry it may be. Blogging is a lot easier, however, if you can muster at least a little enthusiasm for the topic at hand.</p> -->
					<!--end::Text-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::About-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::About card-->
</x-default-layout>