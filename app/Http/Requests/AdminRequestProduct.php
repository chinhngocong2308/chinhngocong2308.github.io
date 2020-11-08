<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'product_name' =>'required|unique:tbl_product,product_name',
            'product_content'=>'required:tbl_product,product_content',
            'product_price'=>'required:tbl_product,product_price',
            
        ];
    }
    public function messages(){
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống !',
            'product_content.required' => 'Vui lòng nhập nội dung sản phẩm !',
            'product_price.required' => 'Vui lòng nhập giá của sản phẩm !',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại !',
           
        ];
    }

}