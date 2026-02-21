<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|',
            'phone' => 'required|',
            'eventId' => 'required|',
            'date' => 'required|',
            'paymentId' => 'required|',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Заполните поле',
          'phone.required' => 'Заполните поле',
          'eventId.required' => 'Выберите практику',
          'date.required' => 'Выберите дату',
          'paymentId.required' => 'Выберите способ оплаты',
        ];
    }
}
