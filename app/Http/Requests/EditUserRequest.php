<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email,'.$this->idUser.',id',
            'full'=>'required|min:4',
            'phone'=>'required|numeric|min:7|unique:users,phone,'.$this->idUser.',id'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email Không được để trống!',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại',
            'full.required'=>'Họ tên Không được để trống!',
            'full.min'=>'Họ tên Không được nhỏ hơn 4 ký tự!',
            'phone.required'=>'số điện thoại Không được để trống!',
            'phone.numeric'=>'Không đúng định dạng kiểu số!',
            'phone.min'=>'Số điện thoại Không được nhỏ hơn 7 ký tự!',
            'phone.unique'=>'Số điện thoại đã tồn tại',
        ];
    }
}
