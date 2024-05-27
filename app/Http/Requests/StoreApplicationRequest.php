<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Авторизация пользователя при запросе
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации запросов
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'model' => ['required'],
            'fault' => ['required'],
            'customer' => ['required'],
            'status' => ['required', 'max:20'],
            'completion' => ['required'],
        ];
    }

    /**
     * Сообщения об ошибках
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'model.required' => 'Это поле обязательно',
            'fault.required' => 'Это поле обязательно',
            'customer.required' => 'Это поле обязательно',
            'status.required' => 'Это поле обязательно',
            'status.max' => 'Не более :max символов',
            'completion.required' => 'Это поле обязательно',
        ];
    }
}
