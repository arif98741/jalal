@extends('layouts.web.home')
@section('title','Homepage')

@section('content')

@include('layouts.web.slider')
@include('layouts.web.top_features')

<div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url({{asset('asset/web/img/bg-img/bg-2.jpg')}}">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
					<span>our testimonials</span>
					<h3>See what our faculties are saying about us</h3>
				</div>
			</div>
		</div>
		<div class="row">


			<!-- ##### CTA Area Start ##### -->
			<div class="call-to-action-area">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
								<h3>Do you want to share your idesas or give us any suggestions?</h3>
								<a href="#" class="btn academy-btn">Click here!</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			@endsection