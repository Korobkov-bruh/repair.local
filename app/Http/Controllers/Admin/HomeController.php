<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // получение выполненных заявок за месяц
        $complete = Application::where('status', 'Выполнен')
            ->where('created_at', '>=', now()->subMonth())
            ->count();

        return view('admin.home', compact('complete'));
    }
}
