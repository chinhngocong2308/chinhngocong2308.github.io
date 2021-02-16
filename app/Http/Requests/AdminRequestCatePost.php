<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestCatePost extends FormRequest
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
            'cate_post_name' =>'required|unique:tbl_category_post,cate_post_name',
            
           
            
        ];
    }
    public function messages(){
        return [
            'cate_post_name.required' => 'Tên danh mục bài viết không được để trống',
             'cate_post_name.unique' => 'Tên danh mục bài viết đã tồn tại',
           
           
        ];
    }

}