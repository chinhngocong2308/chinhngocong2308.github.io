@extends('layout')
@section('content')
		<!-- header area end -->
		<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Liên hệ</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="page-sidebar-area">					
							<!-- popular tag start -->
							<aside class="sidebar-content">
								<div class="bar-title">
									<div class="bar-ping"><img src="" alt=""></div>
									<h2>Popular Tags</h2>
								</div>
								<div class="exp-tags">
									<div class="tags">
										<a href="#">Jeans</a>
										<a href="#">jackets & coats</a>
										<a href="#">bags</a>
										<a href="#">shoes</a>
										<a href="#">T-shirts</a>
										<a href="#">Shirts</a>
										<a href="#">Head</a>
									</div>
								</div>
							</aside>
							<aside class="sidebar-content">
								<div class="bar-title">
									<div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
									<h2>Danh mục</h2>
								</div>
								<ul class="sidebar-tags">
									 @foreach($category as $key=>$cate)
									<li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a><span> ({{$cate->category_id}})</span></li>
									@endforeach
								</ul>
							</aside>
							<!-- popular tag end -->
							<!-- vote area start -->
								<aside class="sidebar-content">
								<div class="bar-title">
									<div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
									<h2>sản phẩm cho</h2>
								</div>
								
									@foreach( $brand as $key => $br)
									<p><li><a href="{{URL::to('/thuong-hieu-san-pham/'.$br->brand_slug)}}">{{ $br->brand_name}}</a><span> ({{$br->brand_id}})</span></li></p>
									@endforeach
							
								</aside>
							<!-- vote area end -->								
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="contact-us-area">
							<!-- google-map-area start -->
							<div class="google-map-area">
								<!--  Map Section -->
								<div id="contacts" class="map-area" >
									
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5301742065367!2d105.84728551424496!3d21.01146219374603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8ba8897b99%3A0xe6b93e0f7677a11b!2sZARA!5e0!3m2!1svi!2s!4v1605273866073!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									
								</div>

							</div>
							<!-- google-map-area end -->
							<!-- contact us form start -->
							<div class="contact-us-form">
								<div class="sec-heading-area">
									<h2>Liên hệ với chúng tôi</h2>
								</div>
								<div class="contact-form">
									<span class="legend">Thông tin liên hệ</span>
									<form action="#" method="post">
										<div class="form-top">
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Họ  <sup>*</sup></label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Tên <sup>*</sup></label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Fax<sup>*</sup></label>
												<input type="text" class="form-control">
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Email <sup>*</sup></label>
												<input type="email" class="form-control">
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Điện thoại <sup>*</sup></label>
												<input type="text" class="form-control">
											</div>	
											<div class="form-group col-sm-12 col-md-12 col-lg-10">
												<label>Lời nhắn<sup>*</sup></label>
												<textarea class="yourmessage"></textarea>
											</div>												
										</div>
										<div class="submit-form form-group col-sm-12 submit-review">
											<p><sup>*</sup> Phần bắt buộc</p>
											<a href="#" class="add-tag-btn">Gửi</a>
										</div>
									</form>
								</div>
							</div>
							<!-- contact us form end -->
						</div>					
					</div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->
		<!-- FOOTER START -->
		<footer>
			<!-- banner footer area start -->
			<div class="banner-footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-3 nopadding">
							<div class="single-bannerfooter">
								<a href="#">
									<img src="img/banner/footer-1.jpg" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3 nopadding">
							<div class="single-bannerfooter">
								<a href="#">
									<img src="img/banner/footer-2.jpg" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3 nopadding">
							<div class="single-bannerfooter">
								<a href="#">
									<img src="img/banner/footer-3.jpg" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3 nopadding">
							<div class="single-bannerfooter">
								<a href="#">
									<img src="img/banner/footer-4.jpg" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 hidden-xs nopadding">
							<div class="single-bannerfooter">
								<a href="#">
									<img src="img/banner/footer-5.jpg" alt="" />
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 hidden-xs nopadding">
							<div class="single-bannerfooter last-single">
								<a href="#">
									<img src="img/banner/footer-6.jpg" alt="" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- banner footer area end -->
			<!-- top footer area start -->
			<div class="top-footer-area">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-4">
							<div class="single-snap-footer">
								<div class="snap-footer-title">
									<h4>Company info</h4>
								</div>
								<div class="cakewalk-footer-content">
									<p class="footer-des">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim adm.</p>
									<a href="#" class="read-more">Read more</a>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-4">
							<div class="single-snap-footer">
								<div class="snap-footer-title">
									<h4>Information</h4>
								</div>
								<div class="cakewalk-footer-content">
									<ul>
										<li><a href="#">About Us</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Delivery Information</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Terms & Condition</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="single-snap-footer">
								<div class="snap-footer-title">
									<h4>Fashion Tags</h4>
								</div>
								<div class="cakewalk-footer-content">
									<ul>
										<li><a href="#">My Account</a></li>
										<li><a href="#">Login</a></li>
										<li><a href="#">My Cart</a></li>
										<li><a href="#">Wishlist</a></li>
										<li><a href="#">Checkout</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 hidden-sm">
							<div class="single-snap-footer">
								<div class="snap-footer-title">
									<h4>Fashion Tags</h4>
								</div>
								<div class="cakewalk-footer-content">
									<ul>
										<li><a href="#">Sitemap</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Advanced Search</a></li>
										<li><a href="#">Affiliates</a></li>
										<li><a href="#">Contact Us</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 hidden-sm">
							<div class="single-snap-footer">
								<div class="snap-footer-title">
									<h4>Follow Us</h4>
								</div>
								<div class="cakewalk-footer-content social-footer">
									<ul>
										<li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
										<li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a><span> Google Plus</span></li>
										<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><span> Twitter</span></li>
										<li><a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<!-- top footer area end -->
@endsection