<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\AdminRequestProduct;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\CatePost;
use App\Models\Post;
use Session;
session_start();

class ContactController extends Controller
{
    public function lien_he(Request $request){
    	  $category_post = CatePost::orderby('cate_post_id','DESC')->get();
         $meta_desc = "Thời trang vàng"; 
        $meta_keywords = "lien-he-voi-chung-toi";
        $meta_title = "SHOP|Liên hệ";
        $url_canonical = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        // $all_product = DB::table('tbl_product')
     //    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
     //    ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
     //    ->orderby('tbl_product.product_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->paginate(3);

        return view('pages.contact.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post);
    }
}
