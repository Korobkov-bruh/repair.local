<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'email' => ['nullable', 'email'],
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
            'name.required' => 'Введите название отзыва',
            'text.required' => 'Напишите отзыв',
            'rating.required' => 'Выставите вейтинг отзыва',
            'rating.numeric' => 'Рэйтинг должен быть числом',
            'rating.between' => 'Рейтинг должен быть в пределах :min->:max',
            'email.email' => 'Введите e-mail (text@test.ru)',
        ];
    }
}
