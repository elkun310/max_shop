<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountRequest extends FormRequest
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
            'full' =>'required|min:5',
            'email'=>'required|email|unique:users,email,'.$this->idAccount.',id',
            'phone'=>'required|numeric|min:10|unique:users,phone,'.$this->idAccount.',id',
            'address'=>'required',
            
            
            
        ];
    }
    public function messages()
    {
        return [
            'full.required'=>'Họ và tên không được để trống!',
            'full.min'=>'Họ và tên không được nhỏ hơn 5 ký tự!',
            'email.required'=>'Email Không được để trống!',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email không được trùng',
            'phone.required'=>'Số điện thoại Không được để trống!',
            'phone.numeric'=>'Số điện thoại phải là kiểu số!',
            'phone.min'=>'Số điện thoại không được nhỏ hơn 10 ký tự!',
            'phone.unique'=>'Số điện thoại không được trùng!',
            'address.required'=>'Địa chỉ không được để trống',
           
            
        ];
    }
}
