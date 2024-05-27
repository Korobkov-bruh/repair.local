<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailRequest extends FormRequest
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
            // напишите необходимые правила
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
            // напишите необходимые сообщения
        ];
    }
}
