@extends('layout')
@section('content')
                    <div class="slider-area an-1 hm-1">
             <!-- slider -->
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides"> 
                     <img src="{{asset('public/frontend/img/slider/home-1/gvhomepage-trigreca-01-01-img_010920-new-desk.jpg')}}" alt="" title="#slider-direction-1"  />
                     <img src="{{asset('public/frontend/img/slider/home-1/gvhomepage-fw20-01-01-img_161020-desk-full.jpg')}}" alt="" title="#slider-direction-2"  />
                    {{-- <img src="{{asset('public/frontend/img/slider/home-1/gvhomepage-fw20-01-01-img_161020-desk-full.jpg')}}" alt="" title="#slider-direction-3"  />  --}}
                </div>
                <!-- direction 1 -->
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1 lft-pr1">
                        <div class="title-container s-tb-c title-compress">
                            <h2 class="title1">Chính hãng</h2>
                            <h3 class="title2" >Giá rẻ</h3>
                            <h4 class="title2" >NEW SALE!!!</h4>
                            <a class="btn-title" href="{{URL::to('/chi-tiet-san-pham/47')}}">Chọn ngay</a>
                        </div>
                    </div>  
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-2 lft-pr2">
                        <div class="title-container s-tb-c">
                            <h2 class="title1" >Mua 1  </h2>
                             <h3 class="title2">tặng 1 </h3>
                             <h4></h4>
                            <a class="btn-title" href="{{URL::to('/chi-tiet-san-pham/45')}}">Xem ngay</a>
                        </div>
                    </div>  
                </div>
            </div>
            <!-- slider end-->
        </div>
        <!-- end home slider -->
        <!-- product section start -->
        <div class="our-product-area">
            <div class="container">
                <!-- area title start -->
                <div class="area-title">
                    <h2>Sản phẩm mới nhất</h2>
                </div>
                <!-- area title end -->
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="features-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">NEW products</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">Sale Products</a></li>
                            </ul>
                            <!-- Tab pans -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="row">
                                        <div class="features-curosel">
                                             @foreach($all_product as $key=>$product)
                                            <div class="col-lg-12 col-md-12">
                                                <!-- single-product start -->
                                              
                                            
                                                <div class="single-product">
                                                    @if($product->product_sale)
                                                    <span class="sale-text">sale {{$product->product_sale}} %</span>
                                                    @endif
                                                    <div class="product-img" style="height: 400px;width: 300px">
                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                            <img class="secondary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" style="height:400px;width: 300px" />
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
                                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>                                  
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ number_format($product->product_price,0,',','.') }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h2>
                                                        <p>{{$product->product_desc}}</p>
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                            @endforeach
                                           
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="features-curosel">
                                             @foreach($all_product as $key=>$product)
                                             @if($product->product_sale)
                                            <div class="col-lg-12 col-md-12">
                                                <!-- single-product start -->
                                                <div class="single-product">
                                                    <span class="sale-text">sale {{$product->product_sale}} %</span>
                                                    <div class="product-img" style="height: 400px;width: 300px">
                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                                            <img class="primary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                            <img class="secondary-image" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" style="height:400px;width: 300px" />
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
                                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>                                  
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ number_format($product->product_price,0,',','.') }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h2>
                                                        <p>{{$product->product_desc}}</p>
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                               @endif
                                            @endforeach
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
                <!-- our-product area end -->   
            </div>
        </div>
        <!-- product section end -->
    
           <div class="our-product-area">
            <div class="container">
                <!-- area title start -->
                <div class="area-title">
                    <h2>Tin tức</h2>
                </div>
                <!-- area title end -->
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="features-tab">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="row">
                                        <div class="features-curosel">
                                             @foreach($all_post as $key=>$post)
                                            <div class="col-lg-12 col-md-12">
                                                                <div class="single-post">
                                                    <div class="post-thumb">
                                                        <a href="#">
                                                           <img src="{{asset('public/uploads/post/'.$post->post_image)}}" >
                                                        </a>
                                                    </div>
                                                    <div class="post-thumb-info">
                                                        <div class="post-time">
                                                            <span>{{$post->created_at->format('d-m-Y')}}</span>
                                                        </div>
                                                        <div class="postexcerpt">
                                                            <p>{!! $post->post_meta_keywords !!}</p>
                                                            <a href="{{url::to('/chi-tiet-bai-viet/'.$post->post_slug)}}" class="read-more">Đọc thêm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            @endforeach
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
                <!-- our-product area end -->   
            </div>
        </div>
      
     
        <!-- block category area start -->
 {{--    <div class="banner-area">
            <div class="container-fluid">
                <div class="row">
                    <a href=""><img src="https://thebs.vn/wp-content/uploads/2020/11/About.jpg" alt=""></a>
                </div>
            </div>
        </div>   --}}
              <!-- block category area end -->
        <!-- testimonial area start -->
        
        <div class="testimonial-area lap-ruffel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="crusial-carousel">
                            <div class="crusial-content">
                                <p>“Tạo ra khách hàng, không đơn giản chỉ là bán hàng..."</p>
                                <span>Katherine Barchetti</span>
                            </div>
                            <div class="crusial-content">
                                <p>“Đã gọi là hy vọng thì không thể nói đâu là thực, đâu là hư, cũng giống như những con đường trên mặt đất; kỳ thực trên mặt đất vốn làm gì có đường. Người ta đi mãi mà thành đường đó thôi..."</p>
                                <span> Lỗ Tấn</span>
                            </div>
                            <div class="crusial-content">
                                <p>“Trong một thế giới đang thay đổi rất nhanh chóng, lộ trình duy nhất đưa bạn đến thất bại là không dám mạo hiểm.” </p>
                                <span>Mark Zuckerberg!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
       
@endsection