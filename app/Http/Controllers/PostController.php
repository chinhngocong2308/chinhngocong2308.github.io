<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\CatePost;
use Session;
use DB;
use App\Models\Post;
session_start();
class PostController extends Controller
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
   public function add_post()
    {
        $this->AuthLogin();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
   		 $category_post = CatePost::orderby('cate_post_id','DESC')->get();
    	return view('admin.post.add_post')->with(compact('cate_post','category_post'));
    }
     public function save_post(Request $request) // request lay yeu cau giu lieu
    {
        $this->AuthLogin();
    	$data = $request->all();
    	$post = new Post();

    	$post->post_title = $data['post_title'];
    	$post->post_slug = $data['post_slug'];
    	$post->post_desc = $data['post_desc'];
    	$post->post_content = $data['post_content'];
    	$post->post_meta_desc = $data['post_meta_desc'];
    	$post->post_meta_keywords = $data['post_meta_keywords'];
    	$post->cate_post_id = $data['cate_post_id'];
    	$post->post_status = $data['post_status'];
    	
        $get_image = $request->file('post_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); // lay ten hinh anh
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
           
           	$post->post_image = $new_image;
           	$post->save();
            Session::put('message','Thêm bài viết thành công');
            return Redirect()->back();
        }else {
        	Session::put('message','Làm ơn thêm hình ảnh bài viết !');
        	return Redirect()->back();
        }
       	
    }
      public function all_post()
    {	
        $this->AuthLogin();
    	$all_post = Post::with('cate_post')->orderby('post_id','desc')->get();
                          // join DB tbl_category_post vs tbl_post
        return view('admin.post.list_post')->with(compact('all_post'));
    }
       public function delete_post($post_id){
        $this->AuthLogin();
      	$post = Post::find($post_id);
      	$post_image = $post->post_image;
      	if($post_image){
      		unlink('public/uploads/post/'.$post_image);
      	}
      	$post->delete();
        Session::put('message','Xóa bài viết thành công!');
       
        return Redirect()->back();
    }
    public function edit_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        return view('admin.post.edit_post')->with(compact('post','category_post'));
    }
    public function update_post(Request $request, $post_id){
       $this->AuthLogin();
      $data = $request->all();
      $post = Post::find($post_id);
      $post->post_title = $data['post_title'];
      $post->post_slug = $data['post_slug'];
      $post->post_desc = $data['post_desc'];
      $post->post_content = $data['post_content'];
      $post->post_meta_desc = $data['post_meta_desc'];
      $post->post_meta_keywords = $data['post_meta_keywords'];
      $post->cate_post_id = $data['cate_post_id'];
      $post->post_status = $data['post_status'];
      $get_image = $request->file('post_image');
        if($get_image){
            $post_image_old = $post->post_image;
            unlink('public/uploads/post/'.$post_image_old);

            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
           
            $post->post_image = $new_image;
            
        }
        
            $post->save();
          Session::put('message','Cập nhật  bài viết thành công !');
           return Redirect('/all-post');
        }
      public function danh_muc_bai_viet(Request $request,$post_slug){
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        foreach($catepost as $key =>$cate){
              $meta_desc = $cate->cate_post_desc; 
              $meta_keywords = $cate->cate_post_slug;
              $meta_title = $cate->cate_post_name;
              $url_canonical = $request->url();
              $cate_id = $cate->cate_post_id;
         }
          $post = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->get();

          return view('pages.homepost.cate_post_home')->with(compact('category_post','meta_desc','meta_keywords','meta_title','url_canonical','cate_product','brand','post','catepost'));
      }
      function chi_tiet_bai_viet(Request $request,$post_slug){
         $category_post = CatePost::orderby('cate_post_id','DESC')->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $post = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post as $key =>$baiviet){
              $meta_desc = $baiviet->post_meta_desc; 
              $meta_keywords = $baiviet->post_meta_keywords;
              $meta_title = $baiviet->post_title;
              $url_canonical = $request->url();
              $cate_id = $baiviet->cate_post_id;
              $catepost_id = $baiviet->cate_post_id;
         }
        $post_related = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$catepost_id)->whereNotIn('post_slug',[$post_slug])->get();                                   //cate_post_id trong tbl_posts
                                //[ko thuoc]
          return view('pages.homepost.post_home')->with(compact('category_post','meta_desc','meta_keywords','meta_title','url_canonical','cate_product','brand','post','post_related'));

      }
    }
  

