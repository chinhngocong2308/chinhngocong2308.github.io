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
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">NEW PRoducts</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">Random Products</a></li>
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
                            </div>
                        </div>              
                    </div>
                </div>
                <!-- our-product area end -->   
            </div>
        </div>
        <!-- product section end -->
        <!-- banner-area start -->
        <div class="banner-area">
            <div class="container-fluid">
                <div class="row">
                    <a href=""><img src="img/banner/banner-1.jpg" alt="" /></a>
                </div>
            </div>
        </div>
        <!-- banner-area end -->
        <!-- product section start -->
       
        <!-- product section end -->
        <!-- latestpost area start -->
        <div class="latest-post-area">
            <div class="container">
                <div class="area-title">
                    <h2>Latest Post</h2>
                </div>
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="img/post/post-1.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="#">Beauty</a>
                                        <span>/</span>
                                        <span>Post by</span>
                                        <span>BootExperts</span>
                                    </div>
                                    <div class="postexcerpt">
                                        <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas...</p>
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single latestpost end -->
                        <!-- single latestpost start -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="img/post/post-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="#">Fashion</a>
                                        <span>/</span>
                                        <span>Post by</span>
                                        <span>BootExperts</span>
                                    </div>
                                    <div class="postexcerpt">
                                        <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus...</p>
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single latestpost end -->
                        <!-- single latestpost start -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="img/post/post-3.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="#">Brunch Network</a>
                                        <span>/</span>
                                        <span>Post by</span>
                                        <span>BootExperts</span>
                                    </div>
                                    <div class="postexcerpt">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt...</p>
                                        <a href="#" class="read-more">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single latestpost end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- latestpost area end -->
        <!-- block category area start -->
        <div class="block-category">
            <div class="container">
                <div class="row">
                    <!-- featured block start -->
                    <div class="col-md-4">
                        <!-- block title start -->
                        <div class="block-title">
                            <h2>Featureds</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-1.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-2.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$205.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-3.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-4.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Cras neque metus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-5.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-6.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Accumsan elit</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$165.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-3.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-9.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec non est</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$560.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        </div>
                        <!-- block carousel end -->
                    </div>
                    <!-- featured block end -->
                    <!-- featured block start -->
                    <div class="col-md-4">
                        <!-- block title start -->
                        <div class="block-title">
                            <h2>On Sales</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-9.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-10.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Cras neque metus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-7.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-8.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$205.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-11.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-12.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Accumsan elit</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$165.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-13.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-14.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec non est</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$560.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        </div>
                        <!-- block carousel end -->
                    </div>
                    <!-- featured block end -->
                    <!-- featured block start -->
                    <div class="col-md-4">
                        <!-- block title start -->
                        <div class="block-title">
                            <h2>Populers</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        <div class="block-carousel">
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-13.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-14.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Cras neque metus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-11.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-12.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$205.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-4.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-9.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Accumsan elit</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$165.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-7.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="product-details.html"><img src="img/block-cat/block-3.jpg" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="product-details.html">Donec non est</a></h3>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                        <div class="cat-price">$560.00</div>
                                        <div class="cat-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                        </div>
                        <!-- block carousel end -->
                    </div>
                    <!-- featured block end -->
                </div>
            </div>
        </div>
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