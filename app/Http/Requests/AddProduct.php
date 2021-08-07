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
            'type_product_id' => 'required|unique:products',
            'name' =>'required|max:255',
            'description' =>'required|max:255',
            'quality' =>'required',
            'amount' =>'required',
            'price' =>'required',
            'discount_price' =>'required',
            'unit' => 'required',
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
        ];
    }

    public function attributes(){
        return [
            'type_product_id' => 'Loại sản phẩm',
            'name' =>'Tên sản phẩm',
            'description' =>'Mô tả sản phẩm',
            'quality' =>'Thời gian nhập',
            'amount' => 'Số lượng',
            'price' =>'Giá',
            'discount_price' =>'Giá giảm giá',
            'unit' => 'Nhà cung cấp',
            'status' =>'Trạng thái',
            'image' =>'Ảnh',
        ];
    }
}
