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
								</li>
								<li class="category3"><span>Giỏ hàng</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- Shopping Table Container -->
		<div class="cart-area-start">
			<div class="container">
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
						<form method="POST"  action="{{url('/update-cart')}}">
							{{ csrf_field() }}
							  <?php
                                $message = Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-danger">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                 ?>
                                   
							<table class="cart-table">
								<thead>
									<tr>
										<th>Sản phẩm</th>
										<th>Tên sản phẩm</th>
										<th></th>
										<th>Giá tiền</th>
										<th>Số lượng</th>
										<th>Tổng tiền</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								
									@php
										$total = 0;
									@endphp
									 <?php
                                            $cart_id = Session::get('cart');
                                            if($cart_id!=NULL){

							                
                                               
                                       ?>

									@foreach(Session::get('cart') as $key =>$cart) 
									
									@php
										$pricereal = $cart['product_price']*(100-$cart['product_sale'])/100;
										$subtotal = $pricereal*$cart['product_qty'];
										$total+=$subtotal;
										
									@endphp

									<tr>
										<td>
											<a href="#"><img src="http://localhost/shoplaravel/public/uploads/product/{{ $cart['product_image'] }}" class="img-responsive" alt=""/></a>
										</td>
										<td>
											<h6>{{$cart['product_name']}}</h6>
										</td>
										<td><a href="#">Edit</a></td>
										<td>
											<h6>{{number_format($pricereal,0,',','.')}}đ</h6>			
										</td>
										<td>
												<input type="number" name="cart_qty[{{$cart['session_id']}}]" min="1" value="{{$cart['product_qty']}}" >
											
										</td>
										<td>
											<div class="cart-subtotal">{{number_format($subtotal,0,',','.')}}đ</div>
										</td>
										<td><a href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a></td>
									</tr>
									@endforeach	
									<?php } ?>
									<div class="actions-log">
									<input type="submit" class="button" name="login" value="Cập nhật giỏ hàng">
									{{-- <button class="fa fa-refresh" type="submit" style="margin-left: 1088px"> Cập nhật</button> --}}
									</form>
									</div>

									
								</tbody>
							</table>		
							

						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				
				<div class="row">
					<div class="col-md-12 vendee-clue">
						<!-- Shopping Estimate -->
						<div class="shipping coupon">
							<h5>Tính phí vận chuyển và thuế</h5>
							<p>Nhập điểm đến của bạn để ước tính phí vận chuyển</p>
							<form>
								    @csrf
								<div class="shippingTitle"><p><span>*</span>Tỉnh/Thành phố</p></div>
								<div class="selectOption">
									<div class="selectParent">
										<select name="city" id="city" class="form-control input-sm m-bot15 choose city">
											 <option value="">--Chọn tỉnh thành phố--</option>
											  @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
										</select>
									</div>
								</div>
								
								<div class="shippingTitle"><p>Quận/Huyện</p></div>
								<div class="selectOption">
									<div class="selectParent">
										<select name="province" id="province" class="form-control input-sm m-bot15 province choose">
											   <option value="">--Chọn quận huyện--</option>
										
										</select>
									</div>
								</div>
								
								<div class="shippingTitle"><p>Xã/Phường</p></div>
								<div class="selectOption">
									<div class="selectParent">
										  <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
											     <option value="">--Chọn xã phường--</option>   
										
										</select>
									</div>
								</div>
								<button type="submit" name="calculate_order" class="calculate_delivery">Xác nhận</button>
							</form>
					
						{{Session::get('fee')}}
						</div>
						<!-- Shopping Estimate -->
						<!-- Shopping Code -->
						@if(Session::get('cart'))
						<div class="shipping coupon hidden-sm">
							
							<div class=""><h5>Mã giảm giá</h5></div>
							<p>Nhập phiếu mã giảm giá của bạn nếu có.</p>
							
							<form method="POST" action="{{url::to('/check-coupon')}}">
								@csrf
								<input type="text" class="coupon-input" name="coupon">
								<button class="pull-left checkcoupon" type="submit" name="checkcoupon">Áp dụng</button>
								</form>
								@if(Session::get('coupon'))
								<form method="get" action="{{url::to('/unset-coupon')}}">
									 <button class="pull-right" type="submit">Xóa mã </button>
								</form>		
								@endif
							
						</div>
						@endif
						<!-- Shopping Code -->
						<!-- Shopping Totals --> @if(Session::get('cart'))
						<div class="shipping coupon cart-totals">
							<ul>
								<li class="cartSubT">Tổng tiền:    <span>{{number_format($total,0,',','.')}}VNĐ</span></li>
											<?php  if(Session::get('fee')) { 
												$total_after_fee = $total+ Session::get('fee') ?> 
											<li class="cartSubT"> Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}} VNĐ <a href="{{url('/del-fee')}}"><i class="fa fa-times"></i></span> </li>
												<?php		} ?>	

												<?php	if(Session::get('coupon') != NULL){
													foreach(Session::get('coupon') as $key =>$cou){
													if($cou['coupon_condition']==1){ ?>
									<li class="cartSubT"> Giảm giá:<span> {{$cou['coupon_number'] }} % </span></li>
													<p>
														<?php 
															$total_coupon = ($total*$cou['coupon_number'])/100; ?>
											<?php	$total_after_coupon = $total-$total_coupon ?>
																	
								<li class="cartSubT">Số tiền được giảm: <span>{{number_format($total_coupon,0,',','.')}}đ</span></li>
													<?php }												
											if($cou['coupon_condition']==2){ ?>
									<li class="cartSubT">	Giảm giá:<span> {{number_format($cou['coupon_number'],0,',','.')}} VNĐ</span></li>
												<p>
													<?php 
														$total_after_coupon = $total-$cou['coupon_number']
														
													?>
												</p>
									<?php }
										}
									}	?>
								<?php if(Session::get('fee') && !Session::get('coupon')){
									$total_after = $total_after_fee; ?>
									<li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format($total_after,0,',','.')}}VNĐ</span></li> <?php
								}elseif(!Session::get('fee') && Session::get('coupon')){
									 $total_after = $total_after_coupon;
									 ?> <li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format($total_after,0,',','.')}}VNĐ</span></li> <?php 
								}elseif(Session::get('fee') && Session::get('coupon')){
									$total_after = $total_after_coupon;
									$total_after = $total_after + Session::get('fee');
									?><li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format($total_after,0,',','.')}}VNĐ</span></li> <?php 
								}elseif( !Session::get('fee') && !Session::get('coupon')){
									$total_after = $total; ?>
									<li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format($total_after,0,',','.')}}VNĐ</span></li>  <?php
								} ?>
								 
									
											
								
									

									
							</ul>
							<?php
                                            $customer_id = Session::get('customer_id');
                                            if($customer_id!=NULL){
                                               
                                       ?>
                                         <a class="proceedbtn" href="{{URL::to('/checkout')}}">THANH TOÁN</a>
                                        <?php
                                    }else{
                                            ?>
                                            <a class="proceedbtn" href="{{URL::to('/login-checkout')}}">THANH TOÁN</a>
                                            <?php
                                    }
                                     ?>
							@endif
							<div class="multiCheckout">
							{{-- 	<a href="#">Checkout with Multiple Addresses</a> --}}
							</div>
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
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
			<!-- info footer start -->
	
@endsection