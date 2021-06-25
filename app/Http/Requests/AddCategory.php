<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Model\Category;

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
            'name' =>[
                'required','max:255',
                Rule::unique('categories')->where(function ($query) {
                    return $query->where('type', $this->type);
                    // ->ignore($this->id,'id')  file  sửa thêm thuộc tính ngoại trừ
                })
            ],
            'type' =>'required',
            'image' =>'required|image|max:10000',
            'status' =>'required',
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
            'name' =>'Tên danh mục',
            'type' =>'Loại danh mục',
            'image' =>'Ảnh',
            'status' =>'Trạng thái',
        ];
    }
}
