<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class AddUser extends FormRequest
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
            'phone' =>'required|unique:users|regex:/^[0][0-9]{9}$/',
            'email' =>'required|email|unique:users',
            'password' =>'required|max:255',
            'password_confirmation' =>'required|max:255|same:password',
            'role' =>'required',
            'status' =>'required',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'regex'=>':attribute không đúng định dạng số điện thoại',
            'email'=>':attribute không đúng định dạng',
            'same'=>':attribute không đúng',

        ];
    }

    public function attributes(){
        return [
            'name' =>'Họ tên',
            'phone' =>'Số điện thoại',
            'email' =>'Email',
            'password' =>'Mật khẩu',
            'password_confirmation' =>'Mật khẩu nhập lại',
            'role' =>'Quyền',
            'status' =>'Trạng thái',

        ];
    }
}
