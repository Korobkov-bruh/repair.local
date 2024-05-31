<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailRequest extends FormRequest
{
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
            'value' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
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
            'value.required' => 'Обязательно к заполнению',
            'value.max' => 'Максимальное количество символов: :max',
            'value.string' => 'Неверный тип значения',
            'description.string' => 'Неверный тип значения',
        ];
    }
}
