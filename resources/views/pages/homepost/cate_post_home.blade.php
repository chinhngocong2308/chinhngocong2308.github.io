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
				<div class="row" style="width: 80%;height: 80%" >
					<div class="col-md-5 col-sm-12 col-xs-12" >
						<div class="img-element">
							<img src="{{asset('/public/uploads/post/'.$baiviet->post_image)}}" style="height: 250px;width: 400px" alt="banner1">
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="about-page-cntent" style="width: 150%">
							<h3>{{$baiviet->post_title}}</h3>
							<p>{!!$baiviet->post_desc!!}</p>
						</div>
						<div class="add-to-cart" style="margin-left: 300px">
							<a href="{{URL::to('/chi-tiet-bai-viet/'.$baiviet->post_slug)}}" style="background: #3f3f3f"><span style="color: white">Chi tiết</span></a>
						</div>
					</div>
					</div>
					
				@endforeach	
				</div>
			</div>
		</div>
		<!-- hello about end -->
		<!-- service about start -->
	   <div class="banner-area">
            <div class="container-fluid">
                <div class="row">
                    <a href=""><img src="https://thebs.vn/wp-content/uploads/2020/11/About.jpg" alt=""></a>
                </div>
            </div>
        </div>  
		
	@endsection