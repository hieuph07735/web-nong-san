<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EditTypeProduct extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được vượt quá :max',
            'image' => ':attribute phải là ảnh',
            'unique' => ':attribute đã được sử dụng',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên loại sản phẩm',
            'description' => 'Mô tả',
            'category_id' => 'Danh mục',
            'status' => 'Trạng thái',
            'image' => 'Ảnh',
        ];
    }
}
