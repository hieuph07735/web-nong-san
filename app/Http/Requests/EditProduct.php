<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProduct extends FormRequest
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
            'type_product_id' => 'required',
            'name' =>'required|max:255',
            'description' =>'required|max:255',
            'status' =>'required',
            'image' =>'',
            'image.*' =>'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'image' => ':attribute phải là ảnh và thuộc các định dạng: jpeg,png,jpg,gif,svg',
            'unique'=>':attribute đã được sử dụng',
        ];
    }

    public function attributes(){
        return [
            'type_product_id' => 'Loại sản phẩm',
            'name' =>'Tên sản phẩm',
            'description' =>'Mô tả sản phẩm',
            'status' =>'Trạng thái',
            'image' =>'Ảnh sản phẩm',
        ];
    }
}
