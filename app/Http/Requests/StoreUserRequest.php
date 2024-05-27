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
            'name' => ['required'],
            'login' => ['required', 'unique:users'],
            'position' => ['required', 'max:20'],
            'email' => ['required', 'max:50', 'unique:users'],
            'password' => ['required'],
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
            'login.required' => 'Это поле обязательно',
            'login.unique' => 'Это имя уже используется',
            'email.unique' => 'Это имя уже используется',
            'position.required' => 'Это поле обязательно',
            'position.max' => 'Не более :max символов',
            'email.required' => 'Это поле обязательно',
            'email.max' => 'Не более :max символов',
            'password.required' => 'Это поле обязательно',
        ];
    }
}
