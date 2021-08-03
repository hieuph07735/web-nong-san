<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;

class AddCategory extends FormRequest
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
            'name' =>'required|unique:categories',
            'description' =>'required',
            'image' => 'required|image|max:10000',
            'status' => 'required',
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
            'name' =>'Tên danh mục',
            'description' =>'Mô tả',
            'image' =>'Ảnh',
            'status' =>'Trạng thái',
        ];
    }
}
