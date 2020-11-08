<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLoginCheckout extends FormRequest
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
            'customer_name' =>'required:tbl_customers,customer_name',
            'customer_email' =>'required|unique:tbl_customers,customer_email',
            'customer_password' =>'required:tbl_customers,customer_password',
            'customer_phone' =>'required:tbl_customers,customer_phone',
              ];
          }

    public function messages(){
        return [
            'customer_name.required' => 'Họ tên không được để trống !',
            'customer_email.unique' => 'Địa chỉ email đã được đăng kí !!!',

            'customer_email.required' => 'Email không được để trống !',
            'customer_password.required' => 'Mật khẩu không được để trống !',
            'customer_phone.required' => 'Số điện thoại không được để trống !',

            

           
           
        ];
    }

}