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
								<li class="category3"><span>Đăng nhập</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- account-details Area Start -->
		<div class="customer-login-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="customer-login my-account">
							<form action="{{URL::to('/login-customer')}}" method="POST">
								@csrf
								<?php
                                $message = Session::get('message');
                                if($message)
                                {
                                    echo '<span class="text-danger">',$message,'</span>';
                                   Session::put('message',null);
                                }
                                 ?>
								<div class="form-fields">
									<h2>Đăng nhập</h2>
									<p class="form-row form-row-wide">
										<label for="username">Tài khoản hoặc địa chỉ email <span class="required">*</span></label>
										<input type="text" class="input-text" name="email_account" id="username" value="">
									</p>
									<p class="form-row form-row-wide">
										<label for="password">Mật khẩu <span class="required">*</span></label>
										<input class="input-text" type="password" name="password_account" id="password">
									</p>
								</div>
								<div class="form-action">
									<p class="lost_password"> <a href="#">Quên mật khẩu?</a></p>
									<div class="actions-log">
										<input type="submit" class="button" name="login" value="Đăng nhập">
									</div>
									<label for="rememberme" class="inline"> 
									<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Nhớ mật khẩu </label>
									<a href="{{url('login-facebook')}}"><img src="{{asset('public/frontend/img/facebook-login-icon-10.jpg')}}" style="width: 30%;height: 30%;margin-right: 90px"></a>
									<a href="{{url('login-google')}}"><img src="{{asset('public/frontend/img/login-with-google-icon-3.png')}}" style="width: 29%;height:29%;"></a>
								</div>
								
							</form>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="customer-register my-account">
							   @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $errors)
                                            <li>{{$errors}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
							<form method="POST" action="{{URL::to('/add-customer')}}" class="register">
								@csrf
								<div class="form-fields">
									<h2>Đăng kí</h2>
									<p class="form-row form-row-wide">
										<label for="reg_email">Họ và tên <span class="required">*</span></label>
										<input type="text" class="input-text" name="customer_name" id="reg_email" value="">
									</p>
									<p class="form-row form-row-wide">
										<label for="reg_email">Địa chỉ email <span class="required">*</span></label>
										<input type="email" class="input-text" name="customer_email" id="reg_email" value="">
									</p>
									<p class="form-row form-row-wide">
										<label for="reg_password">Mật khẩu <span class="required">*</span></label>
										<input type="reg_password" class="input-text" name="customer_password" id="reg_password">
									</p>
									<p class="form-row form-row-wide">
										<label for="reg_email">Phone <span class="required">*</span></label>
										<input type="text" class="input-text" name="customer_phone" id="reg_email" value="">
									</p>
									<div style="left: -999em; position: absolute;">
										<label for="trap">Anti-spam</label>
										<input type="text" name="email_2" id="trap" tabindex="-1">
									</div>
								</div>
								<div class="form-action">
									<div class="actions-log">
										<input type="submit" class="button" name="register" value="Register">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- account-details Area end -->
	
@endsection