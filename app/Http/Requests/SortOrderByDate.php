<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortOrderByDate extends FormRequest
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
            'order_from_date' =>'required',
            'order_to_date' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'order_from_date.required'=>'Không được để trống!',
            'order_to_date.required'=>'Không được để trống!',
        ];
    }
}
