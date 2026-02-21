<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => 'required|exists:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
       return [
           'login.required' => 'Поле логин обязательное',
           'password.required' => 'Поле пароль обязательное',
           'login.exists' => 'Такого логина не существует'
       ];
    }
}
