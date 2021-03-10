<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditValueRequest extends FormRequest
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
            'value_attr'=>'required|unique:values,value,'.$this->idValue.',id',
        ];
    }
    public function messages()
    {
        return [
            'value_attr.required'=>'Giá trị thuộc tính không được để trống',
            'value_attr.unique'=>'Giá trị thuộc tính không được trùng',
        ];
    }
}
