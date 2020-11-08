@extends('layout')
@section('content')
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
								<li class="category3"><span>Checkout</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- START MAIN CONTAINER -->
		<div class="main-container">

			<div class="product-cart">
				<div class="container">		
					<div class="row">
						<div class="checkout-content">	
							<div class="col-md-9 check-out-blok">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									@if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $errors)
                                            <li>{{$errors}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
									<div class="panel checkout-accordion">
								<?php
                                $message = Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-danger">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                 ?>
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#checkoutMethod" aria-expanded="true" aria-controls="checkoutMethod">
													<span>1</span> Xem qua
												</a>
											</h4>
										</div>
										<div id="checkoutMethod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="content-info">
												<div class="col-md-6" style="width: 100%">
													<div class="checkout-reg">
														<div class="checkReg commonChack">
															<div class="checkTitle">
																<h2 class="ct-design">Rất cảm ơn bạn đã đồng hành với chúng tôi ! </h2>
																<h2 class="ct-design"> </h2>
															</div>
														<h2 class="ct-design">Điều khoản mua hàng</h2>
															<div class="reginputlabel">
														
																{{-- <input type="radio">&nbsp;&nbsp;<label></label>1. Xem lại giỏ hàng<br>
																<input type="radio">&nbsp;&nbsp;<label>3. Điền thông tin gửi hàng</label> --}}
															</div>
														
														</div>
														<div class="regSaveTime commonChack">
															<p>Hãy điền đúng thông tin để chúng tôi có thể liên hệ đến bạn với bạn sớm nhất !</p>
															<ul class="reginputlabel">
																<li><span style="color: red"> Để thanh toán đơn hàng của bạn chọn mục 3.<span></li>
																<li>Xem lại thông tin giỏ hàng tại mục 2.</li>
																<li>Tham quan và tiếp tục chọn lựa sản phẩm của chúng tôi nhấn mua hàng ở bên dưới !</li>
															<a href="{{url::to('/shop')}}" class="checkPageBtn">Mua Hàng</a>	
															</ul>
														</div>


													{{-- 	<a href="#" class="checkPageBtn">Tiếp tục  </a> --}}
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingTwo">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#billingInformation" aria-expanded="false" aria-controls="billingInformation">
													<span>2</span> Xem lại giỏ hàng 
												</a>
											</h4>
										</div>
										<div id="billingInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
											<div class="content-info" style="overflow-x:scroll">
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
																	<input type="submit" class="button" name="update" value="Cập nhật giỏ hàng">
																	{{-- <button class="fa fa-refresh" type="submit" style="margin-left: 1088px"> Cập nhật</button> --}}
																	</div>
																</tbody>
															</table>
															<div class="shipping coupon cart-totals">
							
							<ul>
								<li class="cartSubT">Tổng tiền:    <span>{{number_format($total,0,',','.')}}VNĐ</span></li>
											<?php  if(Session::get('fee')) { 
												$total_after_fee = $total- Session::get('fee') ?> 
											<li class="cartSubT"> Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}} VNĐ </span> </li>
												<?php		} ?>	

												<?php	if(Session::get('coupon')){
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
									$total_after = $total_after - Session::get('fee');
									?><li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format($total_after,0,',','.')}}VNĐ</span></li> <?php 
								}elseif( !Session::get('fee') && !Session::get('coupon')){
									$total_after = $total; ?>
									<li class="cartSubT">Số tiền cần thanh toán: <span>{{number_format($total_after,0,',','.')}}VNĐ</span></li>  <?php
								} ?>
								 
									
											
								
									

									
							</ul>
							
							<div class="multiCheckout">
							{{-- 	<a href="#">Checkout with Multiple Addresses</a> --}}
							</div>
						</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
											</div>
										</div>
									</div>
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingThree">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shippingMethod" aria-expanded="false" aria-controls="shippingMethod">
													<span style="color:red">3</span> Điền thông tin gửi hàng
												</a>
											</h4>
										</div>
										
										<div id="shippingMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
											<div class="content-info">
												<div class="col-md-12">
											<div class="form-top">
										
										<form  method="POST">
												@csrf
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Họ và tên <sup>*</sup></label>
												<input type="text" name="shipping_name" class="form-control shipping_name">
											@if(Session::get('fee'))									
												<input type="hidden" name="order_fee" class="form-control order_fee" value="{{Session::get('fee')}}">
											@else
												<input type="hidden" name="order_fee" class="form-control order_fee" value="10000">
											@endif
											@if(Session::get('coupon'))
											@foreach (Session::get('coupon') as $key => $cou) 				
											 		<input type="hidden" name="order_coupon" class="form-control order_coupon" value="{{$cou['coupon_code']}}">
											@endforeach
											@else
												<input type="hidden" name="order_coupon" class="form-control order_coupon" value="No">
											@endif
											</div>
											
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Địa chỉ email <sup>*</sup></label>
												<input type="email" name="shipping_email" class="form-control shipping_email">
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Địa chỉ <sup>*</sup></label>
												<input type="text" name="shipping_address" class="form-control shipping_address">
											</div>											
											<div class="form-group col-sm-6 col-md-6 col-lg-5">
												<label>Số điện thoại <sup>*</sup></label>
												<input type="text" name="shipping_phone" class="form-control shipping_phone">
											</div>
											<div class="form-group col-sm-12 col-md-12 col-lg-10">
												<label>Chọn hình thức thanh toán:  <sup>*</sup></label>
												<select name="payment_select" class="payment_select">
													<option value="0">Qua chuyển khoản</option>
													<option value="1">Tiền mặt</option>
												 </select>													
											</div>
											<div class="form-group col-sm-12 col-md-12 col-lg-10">
												<label>Ghi chú đơn hàng: <sup>*</sup></label>
												<textarea class="yourmessage shipping_desc" name="shipping_desc"></textarea>				
											</div>
											
										</div>
										<?php
                               			 $cart_id = Session::get('cart');
										     if($cart_id!=NULL){
        
									     } ?>
										<?php if( $cart_id ){
											?>
										<div class="actions-log " style="margin-left: 300px">
												<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
											</div>
										</div>	
										<?php 
										}	
										?>	
									</form>	
									</div>										
									
					</div>
					<!-- div.info-section -->	
				</div>
				<!-- Checkout Container -->
				<div class="clearfix"></div>
			</div><!-- product-cart -->
		</div>
		<!-- END MAIN CONTAINER -->
		<div class="clearfix"></div>
	
@endsection