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
            'name' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'hours' => ['required', 'string'],
            'social' => ['nullable', 'string', 'max:255'],
            'map' => ['nullable', 'string', 'max:255'],
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
            'name.required' => 'Обязательно к заполнению',
            'name.max' => 'Максимальное количество символов: :max',
            'name.string' => 'Неверный тип значения',
            'address.required' => 'Обязательно к заполнению',
            'address.max' => 'Максимальное количество символов: :max',
            'address.string' => 'Неверный тип значения',
            'phone.max' => 'Максимальное количество символов: :max',
            'phone.string' => 'Неверный тип значения',
            'hours.required' => 'Обязательно к заполнению',
            'hours.string' => 'Неверный тип значения',
            'social.max' => 'Максимальное количество символов: :max',
            'social.string' => 'Неверный тип значения',
            'map.max' => 'Максимальное количество символов: :max',
            'map.string' => 'Неверный тип значения',
        ];
    }
}
