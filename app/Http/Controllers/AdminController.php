<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Admin;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
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
	public function index(){
    return view('admin_login');
	}
	public function show_dashboard(){
		$this->AuthLogin();
		return view('admin.dashboard');
	}
	public function dashboard(Request $request){
		$data = $request->all();
		$admin_email = $data['admin_email'];
		$admin_password = md5($data['admin_password']);
		$login = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
		$login_count = $login->count();
		if($login_count){
			Session::put('admin_name',$login->admin_name);
			Session::put('admin_id',$login->admin_id);
			return Redirect::to('/dashboard');
		} else{
			Session::put('message','Tài khoản hoặc mật khẩu không đúng!');
			return Redirect::to('/admin');
		}
	}
	public function logout(){
		$this->AuthLogin();
		Session::put('admin_name',null);
		Session::put('admin_id',null);
		return Redirect::to('/admin');
	}
}
