<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'code'=>'required|min:3|unique:product,code',
             'name'=>'required|min:3|unique:product,name',
             'price'=>'required|numeric',
             'img'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'code.required'=>'Không được để trống mã sản phẩm',
            'code.min'=>'Mã Sản phẩm không được nhỏ hơn 3 ký tự',
            'code.unique'=>'Mã Sản phẩm đã tồn tại',
            'name.required'=>'Không được để trống tên sản phẩm',
            'name.min'=>'Tên sản phẩm không được nhỏ hơn 3 ký tự',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'price.required'=>'Không được để trống giá sản phẩm',
            'price.numeric'=>'Giá sản phẩm không đúng định dạng',
            'img.image'=>' Ảnh sản phẩm không đúng định dạng',
        ];
    }
}
