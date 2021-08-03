<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProduct extends FormRequest
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
            'name' =>'required|max:255',
            'desc' =>'required|max:255',
            'detail' =>'required',
            'category' =>'required',
            'status' =>'required',
            'image' =>'required|image',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'image' => ':attribute phải là ảnh',
            'unique'=>':attribute đã được sử dụng',
            'image' => ':attribute phải là ảnh',
        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên sản phẩm',
            'desc' =>'Mô tả',
            'detail' =>'Chi tiết',
            'category' =>'Danh mục',
            'status' =>'Trạng thái',
            'image' =>'Ảnh',
        ];
    }
}
