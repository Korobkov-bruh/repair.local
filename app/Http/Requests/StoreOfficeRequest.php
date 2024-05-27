<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficeRequest extends FormRequest
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
            'name' => ['required', 'max:20'],
            'address' => ['required'],
            'hours' => ['required'],
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
            'name.required' => 'Это поле обязательно',
            'name.max' => 'Не более :max символов',
            'address.required' => 'Это поле обязательно',
            'hours.required' => 'Это поле обязательно',
        ];
    }
}
