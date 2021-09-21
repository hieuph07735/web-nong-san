<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EditSlide extends FormRequest
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
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'unique'=>':attribute đã được sử dụng',
        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên danh mục',
            'status' =>'Trạng thái',
        ];
    }
}
