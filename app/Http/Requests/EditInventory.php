<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EditInventory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'amount' => 'required',
            'price' =>'required',
            'date_add' =>'required',
            'expiry' =>'required',
            'status' =>'required',
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
            'amount' =>'Số lượng',
            'price' =>'Giá',
            'date_add' =>'Ngày nhập hàng',
            'expiry' =>'Số lượng ngày hết hạn',
            'status' =>'Trạng thái',
        ];
    }
}
{

}
