<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\CatePost;
use App\Http\Requests\AdminRequestBrand;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;
use App\Models\Brand;
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product()
    {
        $this->AuthLogin();
        $brand = Brand::where('brand_parent',0)->orderby('brand_id','DESC')->get();
    	return view('admin.add_brand_product')->with(compact('brand'));
    }
     public function all_brand_product()
    {	
        $brand = Brand::where('brand_parent',0)->orderby('brand_id','DESC')->get();
    	$all_brand_product = DB::table('tbl_brand')->get();
    	$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product)->with('brand',$brand);
    	return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(AdminRequestBrand $request) // request lay yeu cau giu lieu
    {
         $this->AuthLogin();
    	$data = array();
    	$data['brand_name'] = $request->brand_product_name;
    	//Tên cột trong bảng tbl  //name thuộc tính trong add_cate..method=POST
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_parent'] = $request->brand_parent;
        $data['brand_slug'] = $request->brand_slug;
    	$data['brand_status'] = $request->brand_product_status;
        $data['created_at'] = Carbon::now();
    	DB::table('tbl_brand')->insert($data);
    	Session::put('message','Thêm thương hiệu sản phẩm thành công!');
    	return Redirect::to('add-brand-product');
    }
    public function active_brand_product($brand_product_id){
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
    	Session::put('message','Kích hoạt thương hiệu sản phẩm thành công!');
    	return Redirect::to('all-brand-product');

    }
    public function unactive_brand_product($brand_product_id){
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
    	Session::put('message','Ẩn thương hiệu sản phẩm thành công!');
    	return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
         $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $brand = Brand::where('brand_parent',0)->orderby('brand_id','DESC')->get();
    	$manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product)->with('brand',$brand);
    	return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand_product(AdminRequestBrand$request, $brand_product_id){
         $this->AuthLogin();
    	$data = array();
    	$data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_slug'] = $request->brand_slug;
        $data['brand_parent'] = $request->brand_parent;
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
    	Session::put('message','Cập nhật thương hiệu sản phẩm thành công!');
    	return Redirect::to('all-brand-product');
    }
     public function delete_brand_product($brand_product_id){
         $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xoá thương hiệu sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }
    
    public function show_brand_sex(Request $request,$brand_slug_sex){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_parent','0')->orderby('brand_id','desc')->get(); 
        
        
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_brand.brand_slug',$brand_slug_sex)->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug_sex)->limit(1)->get();
         $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
         
        return view('pages.brand.show_brand_parent')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post);
    }
    
    public function show_brand_parent_shop(Request $request,$brand_slug_parent){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->whereNotIn('brand_parent',['0'])->orderby('brand_id','desc')->get(); 
        
        
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_parent_id','=','tbl_brand.brand_id')->where('tbl_brand.brand_slug',$brand_slug_parent)->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug_parent)->limit(1)->get();
         $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
         
        return view('pages.brand.show_brand_parent')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post);
    }
    
    //end function brand page
     public function show_brand_shop(Request $request, $brand_slug){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->whereNotIn('brand_parent',['0'])->orderby('brand_id','desc')->get(); 
        
        
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_brand.brand_slug',$brand_slug)->get();

        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug)->limit(1)->get();
         $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        foreach($brand_name as $key => $val){
            //seo 
            $meta_desc = $val->brand_desc; 
            $meta_keywords = $val->brand_desc;
            $meta_title = $val->brand_name;
            $url_canonical = $request->url();
            //--seo
        }
         
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post);
    }
    

}
