<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules()
    {
        return [
            //
            'name' => 'required|max:50',
            'name_katakana' => 'required|max:100',
            'postal' => 'required|size:7|string',
            'address1' => 'required|max:255',
            'address2' => 'required|max:255',
            'address3' => 'max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|between:10,11',
            'gender' => 'required',
            'email' => 'required|email',
            'new_password' => 'min:8|regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,128}+\z/|same:new_password_confirm|different:confirm_password|max:128',
            'new_password_confirm' => 'different:confirm_password',
            'confirm_password' => 'required'
        ];
    }
}
