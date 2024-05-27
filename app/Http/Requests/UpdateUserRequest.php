<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'login' => [
                'required',
            ],
            'position' => ['required', 'max:20'],
            'email' => ['required', 'max:50'],
            'password' => ['nullable'],
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
            'name.unique' => 'Это имя уже используется',
            'login.unique' => 'Это имя уже используется',
            'position.required' => 'Это поле обязательно',
            'position.max' => 'Не более :max символов',
            'email.required' => 'Это поле обязательно',
            'email.max' => 'Не более :max символов',
        ];
    }
}
