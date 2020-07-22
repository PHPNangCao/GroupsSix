<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLotOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            "ten" => 'required',
            "sanpham_id" => 'required'

        ];
    }
    public function messages(){
        return [
            "ten.required" => 'Trường này không được để trống',
            "sanpham_id.required" => 'Trường này không được để trống'
        ];
    }
}
