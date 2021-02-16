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
									<img id="zoom1" src="{{url::to('/public/uploads/product/'.$value->product_image)}}" data-zoom-image="{{url::to('/public/uploads/product/'.$value->product_image)}}" alt="big-1">
								</a>
							</div>
							<div class="single-zoom-thumb">
								<ul class="bxslider" id="gallery_01">
									@foreach($image as $key => $imageit ) 
									<li class="">
										<a href="#"  class="elevatezoom-gallery" data-image="{{url::to('/public/uploads/product/'.$imageit->imagesp)}}" data-zoom-image="{{url::to('/public/uploads/product/'.$imageit->imagesp)}}"><img src="{{url::to('/public/uploads/product/'.$imageit->imagesp)}}" alt="zo-th-2"></a>
										
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
														<ul class="list-inline rating">
														@for($count=1;$count<=5;$count++)
														@php
															if($count<=$rating){
																$color = 'color: #000000;';
															}else{
																$color = 'color:#ccc;';
															}
														@endphp
														<li title="rating star" 
														id=""
															data-index=""
															data-product_id=""
															data-rating="{{$rating}}"
															class="rating"
															style="cursor: pointer;{{$color}}; font-size: 20px;">
																&#9733;
															</li>
														@endfor
														</ul>
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
							<li class=""><a href="#home" data-toggle="tab">Mô tả</a></li>
							<li class=""><a href="#binhluan" data-toggle="tab"> Bình luận</a></li>
							<li class="active"><a href="#messages" data-toggle="tab"> Đánh giá</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<!--Active len đầu when load-->
							<div role="tabpanel" class="tab-pane " id="home">
								<div class="product-tab-content">
									<ul> <p>{{$value->product_content}}</p>
									@foreach($image as $key =>$im)
										<p>@for($i=1;$i<=6;$i++)</p>
										<li style="margin-right: 200px"><img src="{{url::to('/public/uploads/product/'.$im->imagesp)}}" style="width: 50%;height: 50%"></li>
										<li style="text-align: center;">Ảnh : {{$i}}</li>
										@endfor
									@endforeach
									</ul>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="binhluan">
								<div class="single-post-comments col-md-6 col-md-offset-3" style="margin-left: 1%;width: 1000px">
									<div id="fb-root"></div>
								<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=2439929359647305&autoLogAppEvents=1" nonce="MspenUjq"></script>
								<div class="fb-comments" data-href="{{$url_canonical}}" data-numposts="10" data-width=""></div>				
								</div>
							</div>
							<div role="tabpanel" class="tab-pane active" id="messages">
								<div class="single-post-comments col-md-6 col-md-offset-3">
									<div class="comments-area">
										<h3 class="comment-reply-title">Review mới nhất</h3>
										<form >
											@csrf
											<input type="hidden" name="comment_product_id" value="{{$value->product_id}}" class="comment_product_id">
											<div id="comment_show"></div>
										</form>
									</div>
									<div class="comment-respond">
										<h3 class="comment-reply-title">Viết đánh giá</h3>
										<form>
											@csrf
										<span class="email-notes">Địa chỉ email của bạn sẽ được ẩn, các trường (*) là bắt buộc</span>
											<div class="row">
												<div class="col-md-12">
													<p>Họ tên *</p>
													<input type="text" class="comment_name">
												</div>
												<div class="col-md-12">
													<p>Email *</p>
													<input type="email" class="comment_email">
												</div>
												<div class="col-md-12">
													<p>Đánh giá sao cho sản phẩm</p>
													<div class="pro-rating">
														<ul class="list-inline rating">
														@for($count=1;$count<=5;$count++)
														@php
															if($count<=$rating){
																$color = 'color:#ffcc00;';
															}else{
																$color = 'color:#ccc;';
															}
														@endphp
														<li title="rating star" 
														id="{{$value->product_id}}-{{$count}}"
															data-index="{{$count}}"
															data-product_id="{{$value->product_id}}"
															data-rating="{{$rating}}"
															class="rating"
															style="cursor: pointer;{{$color}}; font-size: 20px;">
																&#9733;
															</li>
														@endfor
														</ul>
													</div>
												</div>
												<div class="col-md-12 comment-form-comment">
													<p>Nhận xét</p>
													<textarea id="message" class="comment_content" cols="30" rows="10"></textarea>

													<div class="actions-log" >	
														<input type="button" value="Gửi" name="comment" class="send-comment" style="margin-top: 20px">
													</div>
													<div id="notify_comment"></div>
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