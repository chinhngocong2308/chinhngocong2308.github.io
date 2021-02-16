<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
session_start();
class ImagesProduct extends Controller
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
    public function add_images_product()
    {
        $this-> AuthLogin();
      
        $images_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
    	
    	return view('admin.add_images_product')->with('images_product',$images_product);
    }
     public function all_images_product()
    {	
      $this-> AuthLogin();
    	$all_images_product = DB::table('tbl_images_product')->orderby('image_id','desc')->paginate(5);
    	$manager_images_product = view('admin.all_images_product')->with('all_images_product',$all_images_product);
    	return view('admin_layout')->with('admin.all_images_product',$manager_images_product);
    }
    public function save_images_product(Request $request) // request lay yeu cau giu lieu
    {
        $this-> AuthLogin();
    	$data = array();
    	
    	$data['product_id'] = $request->images_product;
    	//Tên cột trong bảng tbl  //name thuộc tính trong add_cate..method=POST
        $data['created_at'] = Carbon::now();
         $get_image = $request->file('imagesp');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['imagesp'] = $new_image;
            DB::table('tbl_images_product')->insert($data);
            Session::put('message','Thêm ảnh thành công');
            return Redirect::to('add-images-product');
        }
        $data['imagesp'] = '';
        DB::table('tbl_images_product')->insert($data);
        Session::put('message','Thêm ảnh thất bại');
        return Redirect::to('add-images-product');
    }
   	 public function edit_images_product($image_id){
        $this-> AuthLogin();
        $images_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
    	$edit_images_product = DB::table('tbl_images_product')->where('image_id',$image_id)->get();
    	$manager_images_product = view('admin.edit_images_product')->with('edit_images_product',$edit_images_product)->with('images_product',$images_product);
    	 // $image_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
    	return view('admin_layout')->with('admin.edit_images_product',$manager_images_product);
    }
     public function update_images_product(Request $request, $image_id){
        $this-> AuthLogin();
    	$data = array();
    	
    	$data['product_id'] = $request->images_product;
    	//Tên cột trong bảng tbl  //name thuộc tính trong add_cate..method=POST
        $data['created_at'] = Carbon::now();
        $get_image = $request->file('imagesp');
      
       if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['imagesp'] = $new_image;
                    DB::table('tbl_images_product')->where('image_id',$image_id)->update($data);
                Session::put('message','Cập nhật ảnh thành công');
                return Redirect::to('all-images-product');
        }
                 
                DB::table('tbl_images_product')->where('image_id',$image_id)->update($data);
                Session::put('message','Cập nhật ảnh thành công');
                return Redirect::to('all-images-product');
        }
       
   
     public function delete_images_product($image_id){
        $this-> AuthLogin();
        DB::table('tbl_images_product')->where('image_id',$image_id)->delete();
         Session::put('message','Xóa ảnh thành công !');
        return Redirect::to('all-images-product');
    }
}
