<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'text' => ['required'],
            'rating' => ['required', 'numeric', 'between:1,10'],
            'email' => ['nullable', 'email'],
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
            'name.required' => 'Введите название отзыва',
            'text.required' => 'Напишите отзыв',
            'rating.required' => 'Выставите вейтинг отзыва',
            'rating.numeric' => 'Рэйтинг должен быть числом',
            'rating.between' => 'Рейтинг должен быть в пределах :min->:max',
            'email.email' => 'Введите e-mail (text@test.ru)',
            'status.required' => 'Поставьте статус отзыва',
        ];
    }
}
