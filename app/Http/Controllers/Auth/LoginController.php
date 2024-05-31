<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Форма аутентификации
     */
    public function create()
    {
        return view('auth.login');
    }


    /**
     * Обработка попыток аутентификации.
     *
     * @param  Request $request запрос
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        // получаем только login и пароль
        $credentials = $request->only('login', 'password');
        // Метод attempt
        // вернет true, если аутентификация прошла успешно.
        // В противном случае будет возвращено false.

        // метод filled есть ли значение в запросе, не пустая строка
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // повторно сгенерировать его токен CSRF
            $request->session()->regenerate();

            // можно встроить переадресацию на нужный маршрут
            // в зависимости от роли пользователя

            // Метод intended перенаправит пользователя на URL-адрес,
            // к которому он пытался получить доступ
            return redirect()->intended('/');
        }

        // пароль при ошибке не возвращаем
        return back()->withErrors([
            'login' => 'Пользователя с такими данными не существует',
        ])->onlyInput('login');
    }
}
