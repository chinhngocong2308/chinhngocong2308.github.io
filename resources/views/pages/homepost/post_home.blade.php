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
									<a href="index.html">Trang chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Tin tức</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- hello about start -->
		<div class="home-hello-info">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="f-title text-center">
							<h3 class="title text-uppercase">{{ $meta_title}}</h3>
						</div>
					</div>
				</div>
					@foreach($post as $key=>$baiviet)
					{!! $baiviet->post_content !!}
				<div class="row" style="width: 80%;height: 80%" >
					<div class="col-md-5 col-sm-12 col-xs-12" >
						<div class="img-element">
							<img src="{{asset('/public/uploads/post/'.$baiviet->post_image)}}" style="height: 250px;width: 400px" alt="banner1">
						</div>
					</div>
					
					</div>
					
				@endforeach	
				</div>
			</div>
		</div>
		<!-- hello about end -->
		<!-- service about start -->
		<div class="our-services-info">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="f-title text-center">
							<h3 class="title text-uppercase">Bài viết liên quan</h3>
						</div>
					</div><!-- End .col-md-12 -->
				</div><!-- End .row -->
				<div class="row">
					<div class="col-md-3 col-sm-4">
						@foreach($post_related as $key =>$p_related)
						<div class="item-team text-center">
							<div class="team-info">
								<div class="team-img">
									<img src="{{asset('public/uploads/post/'.$p_related->post_image)}}" class="img-responsive" alt="team1" height="250" width="250">
									<div class="mask">
										<div class="mask-inner">
											<a href="#"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
										</div>
									</div>
								</div>
							</div>
							<h4>{{$p_related->post_title}}</h4>
							<h5>{{$p_related->created_at->format('d-m-Y')}}</h5>
						</div><!-- End .item-team -->
						@endforeach
					</div><!-- End .col-sm-3 -->
					
				</div><!-- End .row -->
						
					</div><!-- End .our-services-inner -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		</div>
		
	@endsection