<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'text' => ['required'],
            'rating' => ['required', 'numeric', 'between:1,10'],
            'email' => ['email', 'nullable'],
            'status' => ['required'],
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
            'name.required' => 'Введите имя',
            'text.required' => 'Введите отзыв',
            'rating.required' => 'Назначьте рейтинг',
            'rating.numeric' => 'Это числовое значение',
            'rating.between' => 'Должен быть в пределах :min>:max',
            'email.email' => 'Введите e-mail',
            'status.required' => 'Нзанчьте статус',
        ];
    }
}
