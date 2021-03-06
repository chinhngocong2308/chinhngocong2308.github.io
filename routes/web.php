<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//5.8
// Route::get('/','HomeController@index');

// Route::get('/trang-chu','HomeController@index');
//Frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::get('/shop','App\Http\Controllers\ShopController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');
//contact us
Route::get('/lien-he','App\Http\Controllers\ContactController@lien_he');
//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{slug_category_product}','App\Http\Controllers\CategoryProduct@show_category_shop');
Route::get('/thuong-hieu-san-pham/{brand_slug}','App\Http\Controllers\BrandProduct@show_brand_shop');
Route::get('/thuong-hieu-san-pham-parent/{brand_slug_parent}','App\Http\Controllers\BrandProduct@show_brand_parent_shop');
Route::get('/thuong-hieu-san-pham/{brand_slug}','App\Http\Controllers\BrandProduct@show_brand_parent_shop');
Route::get('/thuong-hieu-san-pham-sex/{brand_slug_sex}','App\Http\Controllers\BrandProduct@show_brand_sex');
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@details_product');
Route::POST('/quickview','App\Http\Controllers\ProductController@quickview'); 
Route::post('/load-comment','App\Http\Controllers\ProductController@load_comment');
Route::post('/send-comment','App\Http\Controllers\ProductController@send_comment');
Route::get('/comment','App\Http\Controllers\ProductController@list_comment');

Route::post('/duyet-comment','App\Http\Controllers\ProductController@duyet_comment');
Route::post('/reply-comment','App\Http\Controllers\ProductController@reply_comment');
//danh gia
Route::post('/insert-rating','App\Http\Controllers\ProductController@insert_rating');


//Images Product
Route::get('/add-images-product','App\Http\Controllers\ImagesProduct@add_images_product'); 
Route::get('/edit-images-product/{image_id}','App\Http\Controllers\ImagesProduct@edit_images_product');
Route::get('/delete-images-product/{image_id}','App\Http\Controllers\ImagesProduct@delete_images_product');
Route::get('/all-images-product','App\Http\Controllers\ImagesProduct@all_images_product'); 
Route::POST('/save-images-product','App\Http\Controllers\ImagesProduct@save_images_product'); 
Route::POST('/update-images-product/{image_id}','App\Http\Controllers\ImagesProduct@update_images_product'); 

//Backend
Route::get('/admin','App\Http\Controllers\AdminController@index'); 
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout'); 
Route::POST('/admin-dashboard','App\Http\Controllers\AdminController@dashboard'); 

//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product'); 
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product'); 

Route::POST('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product'); 
Route::POST('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product'); 
//danh mục bài viết Category POST
Route::get('/add-category-post','App\Http\Controllers\CategoryPost@add_category_post'); 
Route::post('/save-category-post','App\Http\Controllers\CategoryPost@save_category_post'); 
Route::get('/all-category-post','App\Http\Controllers\CategoryPost@all_category_post'); 
Route::get('/edit-category-post/{category_post_id}','App\Http\Controllers\CategoryPost@edit_category_post'); 
Route::post('/update-category-post/{cate_id}','App\Http\Controllers\CategoryPost@update_category_post');  
Route::get('/delete-category-post/{cate_id}','App\Http\Controllers\CategoryPost@delete_category_post'); 


//Post-Bài viết backend
Route::get('/add-post','App\Http\Controllers\PostController@add_post'); 
Route::post('/save-post','App\Http\Controllers\PostController@save_post'); 
Route::get('/all-post','App\Http\Controllers\PostController@all_post');
Route::get('/delete-post/{post_id}','App\Http\Controllers\PostController@delete_post'); 
Route::get('/edit-post/{post_id}','App\Http\Controllers\PostController@edit_post');
Route::post('/update-post/{post_id}','App\Http\Controllers\PostController@update_post');
//post bai viet frontend
Route::get('/danh-muc-bai-viet/{post_slug}','App\Http\Controllers\PostController@danh_muc_bai_viet');
Route::get('/chi-tiet-bai-viet/{post_slug}','App\Http\Controllers\PostController@chi_tiet_bai_viet');
//Brand Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product'); 
Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product'); 

Route::POST('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product'); 
Route::POST('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product'); 

Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product'); 
Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product'); 
//Product
Route::get('/add-product','App\Http\Controllers\ProductController@add_product'); 
Route::get('/edit-product/{brand_product_id}','App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product'); 

Route::POST('/save-product','App\Http\Controllers\ProductController@save_product'); 
Route::POST('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product'); 

Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product'); 
Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product'); 
//Coupon

Route::get('/insert-coupon','App\Http\Controllers\CouponController@insert_coupon');
Route::get('/delete-coupon/{coupon_id}','App\Http\Controllers\CouponController@delete_coupon');
Route::post('/insert-coupon-code','App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/list-coupon','App\Http\Controllers\CouponController@list_coupon');

Route::post('/check-coupon','App\Http\Controllers\CartController@check_coupon');
Route::get('/unset-coupon','App\Http\Controllers\CartController@unset_coupon');


// Cart ajax
Route::get('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::get('/delete-all-cart','App\Http\Controllers\CartController@delete_all_cart');
Route::get('/del-product/{session_id}','App\Http\Controllers\CartController@delete_product');
Route::post('/select-delivery-home','App\Http\Controllers\CartController@select_delivery_home');
Route::post('/calculate-fee','App\Http\Controllers\CartController@calculate_fee');

Route::get('/del-fee','App\Http\Controllers\CartController@del_fee');
//Checkout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::get('/checkout','App\Http\Controllers\CheckoutController@view_checkout');

Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');

//Delivery

Route::get('/delivery','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/update-delivery','App\Http\Controllers\DeliveryController@update_delivery');
Route::post('/select-feeship','App\Http\Controllers\DeliveryController@select_feeship');


//Order

Route::get('/print-order/{checkout_code}','App\Http\Controllers\OrderController@print_order');
Route::get('/manage-order','App\Http\Controllers\OrderController@manage_order');
Route::get('/view-order/{order_code}','App\Http\Controllers\OrderController@view_order');
Route::get('/delete-order/{order_id}','App\Http\Controllers\OrderController@delete_order');

//Login facebook,google
Route::get('/login-facebook','App\Http\Controllers\CheckoutController@login_facebook');
Route::get('/login-checkout/callback','App\Http\Controllers\CheckoutController@callback_facebook');
//Login  google
Route::get('/login-google','App\Http\Controllers\CheckoutController@login_google');
Route::get('/login-checkout/google/callback','App\Http\Controllers\CheckoutController@callback_google');

