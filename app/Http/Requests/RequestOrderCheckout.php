<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestOrderCheckout extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'shipping_name' =>'required:tbl_shipping,shipping_name',
            'shipping_email' =>'required|unique:tbl_shipping,shipping_email',
          
            'shipping_phone' =>'required:tbl_shipping,shipping_phone',


            
           
            
        ];
    }
     public function messages(){
        return [
        	 'shipping_name.required' => 'Họ và tên không được để trống. Kiểm tra và điền lại thông tin gửi hàng !!!',
            'shipping_email.unique' => 'Địa chỉ email đã được đăng kí.Kiểm tra và điền lại thông tin gửi hàng !!!',

            'shipping_email.required' => 'Email không được để trống.Kiểm tra và điền lại thông tin gửi hàng !!! !',
           
            'shipping_phone.required' => 'Số điện thoại không được để trống.Kiểm tra và điền lại thông tin gửi hàng !!! ',

        ];
    }

}


