<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
            'model' => ['required', 'string', 'max:255'],
            'fault' => ['required', 'string'],
            'customer' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:20'],
            'completion' => ['nullable', 'date'],
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
            'model.required' => 'Обязательно к заполнению',
            'model.max' => 'Максимальное количество символов: :max',
            'model.string' => 'Неверный тип значения',
            'fault.required' => 'Обязательно к заполнению',
            'fault.string' => 'Неверный тип значения',
            'customer.required' => 'Обязательно к заполнению',
            'customer.max' => 'Максимальное количество символов: :max',
            'customer.string' => 'Неверный тип значения',
            'status.required' => 'Обязательно к заполнению',
            'status.max' => 'Максимальное количество символов: :max',
            'status.string' => 'Неверный тип значения',
            'completion.date' => 'Неверный тип значения',
        ];
    }
}
