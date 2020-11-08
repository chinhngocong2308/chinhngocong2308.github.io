<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RequestLoginCheckout;
use App\Http\Requests\RequestOrderCheckout;
session_start();
use App\Models\Social;
use Socialite;
use App\Models\Customers;

use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Coupon;

use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;

  
class CheckoutController extends Controller
{
   public function login_checkout(){
   		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    	
    	$all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
   		return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
   }

   public function confirm_order(Request $request){
       $data = $request->all();

         $shipping = new Shipping();
         $shipping->shipping_name = $data['shipping_name'];
         $shipping->shipping_email = $data['shipping_email'];
         $shipping->shipping_phone = $data['shipping_phone'];
         $shipping->shipping_address = $data['shipping_address'];
         $shipping->shipping_desc = $data['shipping_desc'];
         $shipping->shipping_method = $data['shipping_method'];
         $shipping->save();
         $shipping_id = $shipping->shipping_id;

         $checkout_code = substr(md5(microtime()),rand(0,26),5);

  
         $order = new Order;
         $order->customer_id = Session::get('customer_id');
         $order->shipping_id = $shipping_id;
         $order->order_status = 1;
         $order->order_code = $checkout_code;

         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $order->created_at = now();
         $order->save();
         if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_coupon =  $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
         }
         Session::forget('coupon');
         Session::forget('fee');
         Session::forget('cart');
    }
   public function add_customer(RequestLoginCheckout $request){
   	$data = array();
   	$data['customer_name'] = $request->customer_name;
   	$data['customer_email'] = $request->customer_email;
   	$data['customer_phone'] = $request->customer_phone;
   	$data['customer_password'] = md5($request->customer_password);

   	$customer_id = DB::table('tbl_customers')->insertGetId($data);

   	Session::put('customer_id',$customer_id);
   	Session::put('customer_name',$request->customer_name);
   	
    return Redirect::to('/checkout');


   }
   public function view_checkout(){
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
      if(Session::get('customer_id')){
   	
   		return view('pages.checkout.view_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product); }
      else {
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product); 
      }
   }
   public function save_checkout_customer(RequestOrderCheckout $request){
   	$data = array();
   	$data['shipping_name'] = $request->shipping_name;
   	$data['shipping_email'] = $request->shipping_email;
   	$data['shipping_phone'] = $request->shipping_phone;
   	$data['shipping_desc'] = $request->shipping_desc;
   	$data['shipping_address'] = $request->shipping_address;

   	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);
   	Session::put('shipping_id',$shipping_id);
   
   	return Redirect::to('/payment');
   }
   public function payment(){

   }
   public function logout_checkout(){
    Session::flush();
    return Redirect::to('/login-checkout');

   }
   // Login
   public function login_customer(Request $request){
      $email = $request->email_account;
      $password = md5($request->password_account);
      $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
      $cart = Session::get('cart');
      
      if($result){
        Session::put('customer_id',$result->customer_id);
        Session::put('customer_name',$result->customer_name);
        return Redirect::to('/checkout');
      }else{
         return Redirect::to('/login-checkout');
      }

   }
   public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang checkout
            $account_name = Customers::where('customer_id',$account->user)->first();
            Session::put('customer_name',$account_name->customer_name);
          Session::put('customer_id',$account_name->customer_id);
            return redirect('/checkout')->with('message', 'Đăng nhập  thành công');
       }else{

             $chinh = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook',

            ]);

            $orang = Customers::where('customer_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Customers::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' =>'',
                ]);
            }
            $chinh->login()->associate($orang);
            $chinh->save();

            // $account_name = Customers::where('customer_id',$account->user)->first();

            // Session::put('customer_name',$account_name->customer_name);
            //  Session::put('customer_id',$account_name->customer_id);
            return redirect('/checkout')->with('message','Để xác nhận mời bạn đăng nhập lại lần nữa !');
        } 
    }

    public function login_google(){
        return Socialite::driver('GOOGLE')->redirect();
   }
    public function callback_google(){
        $provider = Socialite::driver('GOOGLE')->user();
        $account = Social::where('provider','GOOGLE')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang checkout
            $account_name = Customers::where('customer_id',$account->user)->first();
            Session::put('customer_name',$account_name->customer_name);
          Session::put('customer_id',$account_name->customer_id);
            return redirect('/checkout')->with('message', 'Đăng nhập  thành công');
       }else{

            $chinh = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'GOOGLE',

            ]);

            $orang = Customers::where('customer_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Customers::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_password' => '',
                    'customer_phone' =>'',
                ]);
            }
            $chinh->login()->associate($orang);
            $chinh->save();

            // $account_name = Customers::where('customer_id',$account->user)->first();

            // Session::put('customer_name',$account_name->customer_name);
            //  Session::put('customer_id',$account_name->customer_id);
            return redirect('/checkout')->with('message', 'Để xác nhận mời bạn đăng nhập lại lần nữa !');
        } 
    }
}
