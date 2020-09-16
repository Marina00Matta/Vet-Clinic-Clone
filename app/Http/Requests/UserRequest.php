<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|min:3|max:250',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:6|confirmed',
            'phone_number'=>'min:7|max:20|unique:users|alpha_num',
            'recommendation'=>'max:500',
            'address'=>'min:3'
        ];
    }
}
