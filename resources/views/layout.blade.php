<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
   
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SHOP | Notphace</title>
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
   {{--      <meta name="description" content="{{$meta_desc}}">
        <meta name="keywords" content="{{$meta_keywords}}"/>
        <meta name="robots" content="INDEX,FOLLOW"/> --}}
       {{--  <link  rel="canonical" href="{{$url_canonical}}" /> --}}
        <meta name="author" content="">
        <link  rel="icon" type="image/x-icon" href="https://www.versace.com/on/demandware.static/-/Library-Sites-ver-shared-trans/default/dwc296e088/images/icon/jc-favicon.png" />

        <!-- Favicon
        ============================================ -->
      {{--   <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> --}}
        
        <!-- Fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        
        <!-- CSS  -->
        
        <!-- Bootstrap CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        
        <!-- owl.carousel CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}">
        
        <!-- owl.theme CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.css')}}">
            
        <!-- owl.transitions CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.transitions.css')}}">
        
        <!-- font-awesome.min CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">
        
        <!-- font-icon CSS
        ============================================ -->      
        <link rel="stylesheet" href="{{asset('public/frontend/fonts/font-icon.css')}}">
        
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.css')}}">
        
        <!-- mobile menu CSS
        ============================================ -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.min.css')}}">
        
        <!-- nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="{{asset('/public/frontend/custom-slider/css/nivo-slider.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('/public/frontend/custom-slider/css/preview.css')}}" type="text/css" media="screen" />
        
        <!-- animate CSS
        ============================================ -->         
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
        
        <!-- normalize CSS
        ============================================ -->        
        <link rel="stylesheet" href="{{asset('public/frontend/css/normalize.css')}}">
   
        <!-- main CSS
        ============================================ -->          
        <link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
        
        <!-- style CSS
        ============================================ -->          
        <link rel="stylesheet" href="{{asset('public/frontend/style.css')}}">
        
        <!-- responsive CSS
        ============================================ -->          
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
          <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">
        
        <script src="{{asset('/public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <nav id="fixNav">
      <header class="short-stor">
  
            <div class="container-fluid">
                
                <div class="row">
                    <!-- logo start -->
                    <div class="col-md-3 col-sm-12 text-center nopadding-right" id="">
                        <div class="top-logo">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/img/logo.gif')}}" alt="" /></a>
                        </div>
                    </div>
                    <!-- logo end -->
                    <!-- mainmenu area start -->
                    <div class="col-md-6 text-center">
                        <div class="mainmenu">
                            <nav>
                                <ul style="margin-top: -50px">
                                    <li class="expand"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>                      
                                    </li>   @foreach($brand as $key => $brand)
                                    <li class="expand"><a href="shop-grid.html">                  
                                        <a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{ $brand->brand_name}}</a>       
                                    </li>
                                        @endforeach
                                   
                                      
                                    </li>
                                 
                                        <div class="restrain mega-menu megamenu1">

                                     
                                             </span>
                                                
                                           {{--  <span class="block-last">
                                                <a class="mega-menu-title" href="shop-grid.html">Top</a>
                                                <a href="shop-grid.html">Briefs</a>
                                                <a href="shop-grid.html">Camis</a>
                                                <a href="shop-grid.html">Nigntwears</a>
                                                <a href="shop-grid.html">Shapewears</a>
                                            </span> --}}
                                        </div>
                                    </li>
                                    <li class="expand"><a href="{{URL::to('/shop')}}">SHOP</a>
                                    <li class="expand"><a href="about-us.html">Giới thiệu</a></li>
                                    <li class="expand"><a href="contact-us.html">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu start -->
                      
                        <!-- mobile menu end -->
                    </div>
                    <!-- mainmenu area end -->
                    <!-- top details area start -->
                    <div class="col-md-3 col-sm-12 nopadding-left">
                          
                        <div class="top-detail">
                            <div class="expand lang-all disflow">
                                     <?php
                                            $customer_name = Session::get('customer_name');
                                            if($customer_name!=NULL){
                                               
                                       ?>
                                    <a> Hi! {{$customer_name}}</a>
                                  <?php } else {?>
                                     <a>Chào bạn!</a>
                               <?php  } ?>
                            </div>
                            <!-- language division start -->
                              
                            <!-- language division end -->
                            <!-- addcart top start -->
                            <div class="disflow">
                                <div class="circle-shopping expand">
                                    <div class="shopping-carts text-right">
                                        <div class="cart-toggler">
                                              
                                            <a href="{{URL::to('/show-cart')}}"><i class="icon-bag"></i></a>
                                             <?php
                                               
                                                if( Session::get('cart')){
        
                                                 ?>
                                            <a href="#"><span class="cart-quantity">!!!</span></a>
                                            
                                        </div>

                                        <div class="restrain small-cart-content">
                                            
                                            <ul class="cart-list">
                                               <?php } ?> 
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

                                                <li>
                                                    <a class="sm-cart-product" >
                                                        <img src="http://localhost/shoplaravel/public/uploads/product/{{ $cart['product_image'] }}" alt="">
                                                    </a>
                                                    <div class="small-cart-detail">
                                                        <a class="remove" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times-circle"></i></a>
                                                       
                                                        <a class="small-cart-name" href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">{{$cart['product_name']}}</a>
                                                        
                                                        <span class="quantitys"><strong>x{{$cart['product_qty']}}</strong><span>({{number_format($subtotal,0,',','.')}} VNđ</span>)</span>
                                                       
                                                        
                                                    </div>
                                                </li>
                                                 @endforeach
                                                
                                                
                                              
                                             
                                            </ul>
                                           
                                            <p class="buttons">
                                                <a href="{{URL::to('/login-checkout')}}" class="button">Thanh toán</a>
                                            </p>
                                             <?php } ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             
                            <!-- addcart top start -->
                            <!-- search divition start -->
                            <div class="disflow">
                                <div class="header-search expand">
                                    <div class="search-icon fa fa-search"></div>
                                    <div class="product-search restrain">
                                        <div class="container nopadding-right">
                                            <form action="{{URL::to('/tim-kiem')}}" id="searchform" method="post">
                                                {{csrf_field()}}
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="keywords_submit" maxlength="128" placeholder="Tìm kiếm sản phẩm">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- search divition end -->
                            <div class="disflow">
                                <div class="expand dropps-menu">
                                    <a href="#"><i class="fa fa-align-right"></i></a>
                                    <ul class="restrain language">
                                        
                                        <li><a href="wishlist.html">Yêu thích</a></li>
                                        <li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
                                        <?php
                                            $customer_id = Session::get('customer_id');
                                            if($customer_id!=NULL){
                                               
                                       ?>
                                          <li><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
                                        <?php
                                    }else{
                                            ?>
                                             <li><a href="{{URL::to('/login-checkout')}}">Thanh toán</a></li>
                                            <?php
                                    }
                                     ?>
                                       
                                       <?php
                                            $customer_id = Session::get('customer_id');
                                            if($customer_id!=NULL){
                                               
                                       ?>
                                         <li><a href="{{URL::to('/logout-checkout')}}">Đăng xuất</a></li>
                                        <?php
                                    }else{
                                            ?>
                                             <li><a href="{{URL::to('/login-checkout')}}">Đăng nhập</a></li>
                                            <?php
                                    }
                                     ?>
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- top details area end -->
                </div>
            </div>
        </header>
    </nav>
    <body class="home-one">
       
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
        <!-- header area start -->
      
        <!-- header area end -->
        <!-- start home slider -->
        <nav class="fixedheader">
            @yield('content')
        </nav>
        
        <!-- Brand Logo Area End -->
        <!-- FOOTER START -->
        <footer>
            <!-- top footer area start -->
            <div class="top-footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="single-snap-footer">
                                <div class="snap-footer-title">
                                    <h4>Công ty TNHH Công Chính</h4>
                                </div>
                                <div class="cakewalk-footer-content">
                                    <p class="footer-des">Cái tên NOTPHACESHOP, được thành lập bởi Công Chính vào năm 1978. Cửa hàng đầu tiên của NOTPHACESHOP được khai trương vào năm 1978 ở phố Via della Spiga tại Milano và ngay lập tức trở nên nổi tiếng</p>
                                    <a href="https://vi.wikipedia.org/wiki/Versace" class="read-more">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4" style="margin-left: 120px">
                            <div class="single-snap-footer">
                                <img src="{{asset('public/frontend/img/post/1_4m5P9oVHREcsZenKaydYcQ.png')}}">
                               {{--  <div class="snap-footer-title">
                                    <h4>Information</h4>
                                </div> --}}
                               {{--  <div class="cakewalk-footer-content">
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Condition</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                       
                       
                        <div class="col-md-2 hidden-sm" style="margin-left: 100px">
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
            <div class="info-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Địa chị</h3>
                                    <p>Notphace Shop, 24 Xuân Dục, Yên Thường, Gia Lâm, Hà Nội</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Liên hệ</h3>
                                    <p>0981503848</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Email Hỗ Trợ</h3>
                                    <p>chinhngocong2308@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 hidden-sm">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Giờ mở của</h3>
                                    <p>Thứ 2 - Thứ 7 : 9:00 am - 22:00 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- info footer end -->
            <!-- banner footer area start -->
            <div class="banner-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-3 nopadding">
                            <div class="single-bannerfooter">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/banner/90_N15253-N403687_N1194_20_VersaceAlphabetPlate-G-Plates-versace-online-store_1_1.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-3 nopadding">
                            <div class="single-bannerfooter">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/banner/90_N15253-N403688_N1194_20_VersaceAlphabetPlate-H-Plates-versace-online-store_1_1.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-3 nopadding">
                            <div class="single-bannerfooter">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/banner/90_N15253-N403689_N1194_20_VersaceAlphabetPlate-I-Plates-versace-online-store_1_1.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-3 nopadding">
                            <div class="single-bannerfooter">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/banner/90_N15253-N403694_N1194_20_VersaceAlphabetPlate-N-Plates-versace-online-store_1_1.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 hidden-xs nopadding">
                            <div class="single-bannerfooter">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/banner/90_N15253-N403688_N1194_20_VersaceAlphabetPlate-H-Plates-versace-online-store_1_1.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 hidden-xs nopadding">
                            <div class="single-bannerfooter last-single">
                                <a href="#">
                                    <img src="{{asset('public/frontend/img/banner/90_N15253-N403704_N1194_20_VersaceAlphabetPlate-X-Plates-versace-online-store_1_1.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner footer area end -->
            <!-- footer address area start -->
            <div class="address-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <address>Copyright © <a href="http://bootexperts.com/">BootExperts.</a> All Rights Reserved</address>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="footer-payment pull-right">
                                <a href="#"><img src="{{asset('public/frontend/img/payment.png')}}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer address area end -->
        </footer>
        <!-- FOOTER END -->
        
        <!-- JS -->
        
        <!-- jquery-1.11.3.min js
        ============================================ -->         
        <script src="{{asset('/public/frontend/js/vendor/jquery-1.11.3.min.js')}}"></script>
        
        <!-- bootstrap js
        ============================================ -->         
        <script src="{{asset('/public/frontend/js/bootstrap.min.js')}}"></script>
        
        <!-- Nivo slider js
        ============================================ -->        
        <script src="{{asset('public/frontend/custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/frontend/custom-slider/home.js')}}" type="text/javascript"></script>
        
        <!-- owl.carousel.min js
        ============================================ -->       
        <script src="{{asset('/public/frontend/js/owl.carousel.min.js')}}"></script>
        
        <!-- jquery scrollUp js 
        ============================================ -->
        <script src="{{asset('/public/frontend/js/jquery.scrollUp.min.js')}}"></script>
        
        <!-- price-slider js
        ============================================ --> 
        <script src="{{asset('/public/frontend/js/price-slider.js')}}"></script>
        
        <!-- elevateZoom js 
        ============================================ -->
        <script src="{{asset('/public/frontend/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
        
        <!-- jquery.bxslider.min.js
        ============================================ -->       
        <script src="{{asset('/public/frontend/js/jquery.bxslider.min.js')}}"></script>
        
        <!-- mobile menu js
        ============================================ -->  
        <script src="{{asset('/public/frontend/js/jquery.meanmenu.js')}}"></script>   
        
        <!-- wow js
        ============================================ -->       
        <script src="{{asset('/public/frontend/js/wow.js')}}"></script>
        
        <!-- plugins js
        ============================================ -->         
        <script src="{{asset('/public/frontend/js/plugins.js')}}"></script>
        
        <!-- main js
        ============================================ -->           
        <script src="{{asset('/public/frontend/js/sweetalert.js')}}"></script>
        <script src="{{asset('/public/frontend/js/main.js')}}"></script>
        
        <script type="text/javascript">
             $(document).ready(function(){
            $('.send_order').click(function(){
                swal({
                 
                  title: "Xác nhận đơn hàng",
                  text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Cảm ơn, Mua hàng",

                    cancelButtonText: "Đóng,chưa mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                     if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_desc = $('.shipping_desc').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            type: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_desc:shipping_desc,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                               swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });

                        window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);

                      } else {
                        swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                      }
              
                });

               
            });
        });
    

        </script>

         <script type="text/javascript" >
             $(document).ready(function(){
                $('.add-to-cart').click(function(){
                    var id= $(this).data('id_product');
                 
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_image = $('.cart_product_image_' + id).val();
                    var cart_product_price = $('.cart_product_price_' + id).val();
                    var cart_product_sale = $('.cart_product_sale_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var _token = $('input[name="_token"]').val();
                    
                    $.ajax({
                      url: '{{url('/add-cart-ajax')}}',
                    method:'POST',
                    data:{cart_product_id:cart_product_id,
                        cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,
                        cart_product_sale:cart_product_sale,
                        cart_product_qty:cart_product_qty,
                        _token:_token},
                    success:function(data){
                            swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                             function() {
                                window.location.href = "{{url('/show-cart')}}";
                            });

                    }

                    });
                });
             });
         </script>
         <script type="text/javascript">
            $(document).ready(function(){
                   $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
            }); 
            });
            
         </script>
         <script type="text/javascript">
             $(document).ready(function(){
                $('.calculate_delivery').click(function(){
                    var matp = $('.city').val();
                    var maqh = $('.province').val();
                    var xaid = $('.wards').val();
                    var _token = $('input[name="_token"]').val();
                    if(matp =='' && maqh=='' && xaid==''){
                        alert('Chọn địa chỉ chúng tôi có thể giao hàng tới bạn !');
                    } else {
                $.ajax({
                url : '{{url('/calculate-fee')}}',
                method: 'POST',
                data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                success:function(){
                   location.reload(); 
                
                }
                });
                 }
                });
                 });
         </script>
    </body>
</html>