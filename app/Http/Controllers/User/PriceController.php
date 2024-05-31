<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PriceController extends Controller
{
    public function index()
    {
        // получение данных
        $services = Services::orderBy('price')->get();

        $details = Detail::all('name', 'value')->toArray();

        $key = Arr::pluck($details, 'name');
        $value = Arr::pluck($details, 'value');

        $details = array_combine($key, $value);


        return view('user.price', compact('services', 'details'));
    }
}
