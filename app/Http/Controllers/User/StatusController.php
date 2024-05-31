<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class StatusController extends Controller
{
    /**
     * Форма
     */
    public function index()
    {

        $details = Detail::all('name', 'value')->toArray();

        $key = Arr::pluck($details, 'name');
        $value = Arr::pluck($details, 'value');

        $details = array_combine($key, $value);

        return view('user.status', compact('details'));
    }

    /**
     * Результат запроса
     */
    public function status(Request $request)
    {
        $application = Application::findOrFail($request->id);

        return view('user.status', compact('application'));
    }
}
