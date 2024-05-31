<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Выход пользователя из приложения.
     *
     * @param  \Illuminate\Http\Request $request запрос
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // удалим аутентификацию из сессии пользователя
        Auth::logout();

        // аннулируем сессию пользователя
        $request->session()->invalidate();
        // повторно генерируем его токен CSRF.
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
