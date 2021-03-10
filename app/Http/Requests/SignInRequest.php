<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
            'email2' =>'required',
            'password2'=>'required|min:5'
        ];
    }
    public function messages()
    {
        return [
            'email2.required'=>'Không được để trống email/ số điện thoại',
            'email2.email'=>'email không đúng định dạng',
            'password2.required'=>'Không được để trống mật khẩu',
            'password2.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
        ];
    }
}
