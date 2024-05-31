<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'unique:users', 'max:255'],
            'position' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'max:255'],
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
            'login.required' => 'Обязательно к заполнению',
            'login.max' => 'Максимальное количество символов: :max',
            'login.string' => 'Неверный тип значения',
            'login.unique' => 'Логин уже используется',
            'position.required' => 'Обязательно к заполнению',
            'position.max' => 'Максимальное количество символов: :max',
            'position.string' => 'Неверный тип значения',
            'email.required' => 'Обязательно к заполнению',
            'email.max' => 'Максимальное количество символов: :max',
            'email.string' => 'Неверный тип значения',
            'password.required' => 'Обязательно к заполнению',
            'password.max' => 'Максимальное количество символов: :max',
            'password.string' => 'Неверный тип значения',
        ];
    }
}
