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
									<a href="{{URL::to('/shop')}}">SHOP</a>
									<span><i class="fa fa-angle-right"></i></span>
									<li class="category3"><span>Chi tiết sản phẩm</span></li>
									
									
								</li>

								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		@foreach($product_details as $key =>$value)
		<div class="product-details-area">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img id="zoom1" src="http://localhost/shoplaravel/public/uploads/product/{{ $value->product_image }}" data-zoom-image="http://localhost/shoplaravel/public/uploads/product/{{ $value->product_image }}" alt="big-1">
								</a>
							</div>
							<div class="single-zoom-thumb">
								<ul class="bxslider" id="gallery_01">
									@foreach($image as $key => $imageit ) 
									<li class="">
										
										<a href="#"  class="elevatezoom-gallery" data-image="http://localhost/shoplaravel/public/uploads/product/{{ $imageit->imagesp }}" data-zoom-image="http://localhost/shoplaravel/public/uploads/product/{{ $imageit->imagesp }}"><img src="http://localhost/shoplaravel/public/uploads/product/{{ $imageit->imagesp }}" alt="zo-th-2"></a>
										
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							 <?php
                                $message = Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-danger">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                 ?>
							<div class="single-product">
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{$value->product_name}}</a></h2>
									<div class="rating-price">	
										<div class="pro-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
										</div>
										<div class="price-boxes">
									
											
											@if($value->product_sale) 
											<span class="new-price">{{ number_format((($value->product_price)*(100-($value->product_sale))/100),0,',','.') }} VNĐ /</span>
											<span style="text-decoration: line-through;">{{number_format($value->product_price,0,',','.')}} VNĐ</span>
											@endif    
												@if(!$value->product_sale)
												<span class="new-price">{{number_format($value->product_price,0,',','.')}} VNĐ</span>
												@endif
										

										</div>
									</div>
									<div class="product-desc">
										<p>{{$value->product_content}}</p>
									</div>
									<p class="availability in-stock">Tình trạng <span>Còn hàng</span></p>
									<div class="actions-e">
										<div class="action-buttons-single">
											
											<form method="POST">

												{{ csrf_field()}}

												 <label for="qty">Số lượng:</label>
												<input class="cart_product_qty_{{$value->product_id}}" id="qty" min="1" value="1" title="Qty" type="number" style="width:10%">
												<input class="cart_product_id_{{$value->product_id}}" type="hidden" value="{{$value->product_id}}"/>
												<input class="cart_product_name_{{$value->product_id}}" type="hidden" value="{{$value->product_name}}"/>
												<input class="cart_product_image_{{$value->product_id}}" type="hidden" value="{{$value->product_image}}"/>
												<input class="cart_product_price_{{$value->product_id}}" type="hidden" value="{{$value->product_price}}"/>
												<input class="cart_product_sale_{{$value->product_id}}" type="hidden" value="{{$value->product_sale}}"/>

												{{-- <a  href="{{URL::to('/save-cart')}}">Thêm giỏ hàng</a> --}}
												
											
											<div class="inputx-content">
											
											</div>

											
											
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
												</div>									
											</div>
											<div class="singl-share">
                                       	 <a href="#"><img src="{{asset('/public/frontend/img/single-share.png')}}" alt=""></a>
                                  		  </div>
											<div class="actions-log">	
											<input type="button" value="Thêm giỏ hàng" name="add-to-cart" class="add-to-cart" data-id_product="{{$value->product_id}}">
											</div>
											</form>	
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Mô tả</a></li>
							<li class=""><a href="#binhluan" data-toggle="tab"> Bình luận</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Đánh giá(1)</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<!--Active len đầu when load-->
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									{{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. </p>
									<p>Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>	 --}}
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="binhluan">
								<div class="single-post-comments col-md-6 col-md-offset-3" style="margin-left: 1%;width: 200%">
									<div id="fb-root"></div>
								<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=2439929359647305&autoLogAppEvents=1" nonce="MspenUjq"></script>
								<div class="fb-comments" data-href="http://localhost/shoplaravel/chi-tiet-san-pham/{{$value->product_id}}" data-numposts="5" data-width=""></div>				
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments col-md-6 col-md-offset-3">
									<div class="comments-area">
										<h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>
										<div class="comments-list">
											<ul>
												<li>
													<div class="comments-details">
														<div class="comments-list-img">
															<img src="img/user-1.jpg" alt="">
														</div>
														<div class="comments-content-wrap">
															<span>
																<b><a href="#">Admin - </a></b>
																<span class="post-time">October 6, 2014 at 1:38 am</span>
															</span>
															<p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
														</div>
													</div>
												</li>									
											</ul>
										</div>
									</div>
									<div class="comment-respond">
										<h3 class="comment-reply-title">Add a review</h3>
										<span class="email-notes">Your email address will not be published. Required fields are marked *</span>
										<form action="#">
											<div class="row">
												<div class="col-md-12">
													<p>Name *</p>
													<input type="text">
												</div>
												<div class="col-md-12">
													<p>Email *</p>
													<input type="email">
												</div>
												<div class="col-md-12">
													<p>Your Rating</p>
													<div class="pro-rating">
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
													</div>
												</div>
												<div class="col-md-12 comment-form-comment">
													<p>Your Review</p>
													<textarea id="message" cols="30" rows="10"></textarea>
													<input type="submit" value="Submit">
												</div>
											</div>
										</form>
									</div>						
								</div>
							</div>

						</div>					
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<!-- product-details Area end -->
		<!-- product section start -->
		<div class="our-product-area new-product">
			<div class="container">
				<div class="area-title">
					<h2>Sản phẩm liên quan</h2>
				</div>
				<!-- our-product area start -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="features-curosel">
								<!-- single-product start -->
								@foreach($related as $key=>$relatedpro)
                                            <div class="col-lg-12 col-md-12">
                                                <!-- single-product start -->
                                              
                                            
                                                <div class="single-product">
                                                    @if($relatedpro->product_sale)
                                                    <span class="sale-text">sale {{$relatedpro->product_sale}} %</span>
                                                    @endif
                                                    <div class="product-img" style="height: 400px;width: 300px">
                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$relatedpro->product_id)}}">
                                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$relatedpro->product_image)}}" alt="" />
                                                            <img class="secondary-image" src="{{URL::to('public/uploads/product/'.$relatedpro->product_image)}}" alt="" style="height:400px;width: 300px" />
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="add-to-wishlist">
                                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                    </div>
                                                                    <div class="compare-button">
                                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>                                  
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ number_format($relatedpro->product_price,0,',','.') }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a href="{{URL::to('/chi-tiet-san-pham/'.$relatedpro->product_id)}}">{{$relatedpro->product_name}}</a></h2>
                                                        <p>{{$relatedpro->product_desc}}</p>
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                            @endforeach
								<!-- single-product end -->
								
							
							</div>
						</div>	
					</div>
				</div>
				<!-- our-product area end -->	
			</div>
		</div>
		<!-- product section end -->
		<!-- FOOTER START -->
		@endsection