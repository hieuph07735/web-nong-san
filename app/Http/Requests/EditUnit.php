<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUnit extends FormRequest
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
                Rule::unique('units')->ignore($this->id,'id')->where(function ($query) {
                    return $query->where('status','!=' , 3);
                })
            ],
            'phone' =>'required|regex:/^[0][0-9]{9}$/',
            'address' => 'required|max:255',
            'status' => 'required',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'regex'=>':attribute số điện thoại không hợp lệ ',
        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên nhà cung cấp ',
            'phone' =>'Số điện thoại',
            'address' =>'Địa chỉ',
            'status' =>'Trạng thái',
        ];
    }
}
