<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'min:2|required',
            'phone' => 'required',
            'email' => 'email|required', //проверка на правила email | обязательность | уникальность
            'password' => 'min:3|max:30|required|confirmed', // минимальная/максимальная длинна | обязательность | подтверждение пароля
        ];
    }

    public function messages()
    {
       return [
           'password.confirmed' => 'пароли не совпадают',
           'login.min' => 'логин не менее 3 символов',
       ];
    }
}
