<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name'=>'required|min:5',
            'email'=>'required|email',
            'content'=>'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Bạn vui lòng điền họ tên',
            'name.min' =>'Họ và tên không được nhỏ hơn 5 ký tự',
            'email.email' =>'Email không đúng định dạng',
            'email.required' =>'Bạn vui lòng điền email',
            'content.required' =>'Bạn vui lòng nhập bình luận',
            'content.min' => 'Nội dung bình luận không nhỏ hơn 10 ký tự',
        ];
    }
}
