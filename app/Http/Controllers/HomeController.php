<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\CatePost;
use Session;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        $all_post = Post::orderby('post_id','desc')->where('post_status','0')->get();
        $category_post = CatePost::orderby('cate_post_id','DESC')->where('cate_post_status','0')->get();
        $meta_desc = "Thời trang vàng"; 
        $meta_keywords = "thoi-trang-quan-ao-tuisach-giaydep";
        $meta_title = "SHOP|Notphace";
        $url_canonical = $request->url();

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    	// $all_product = DB::table('tbl_product')
     //    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
     //    ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
     //    ->orderby('tbl_product.product_id','desc')->get();
    	$all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post)->with('all_post',$all_post);
    	
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
         $all_post = Post::orderby('post_id','desc')->where('post_status','0')->get();
        $category_post = CatePost::orderby('cate_post_id','DESC')->where('cate_post_status','0')->get();
        $meta_desc = "Thời trang vàng"; 
        $meta_keywords = "thoi-trang-quan-ao-tuisach-giaydep";
        $meta_title = "SHOP|Notphace";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
      
        return view('pages.product.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post)->with('all_post',$all_post);
    }
}
