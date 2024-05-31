<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Office;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function index()
    {
        // офисы
        $offices = Office::orderBy('id')->get();

        // реквизиты
        $details = Detail::all('name', 'value')->toArray();

        $key = Arr::pluck($details, 'name');
        $value = Arr::pluck($details, 'value');

        $details = array_combine($key, $value);

        // отзывы
        $reviews = Review::where('status', 'Опубликован')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get(['id', 'name', 'text', 'rating', 'created_at']);

        return view('user.index', compact('reviews', 'details', 'offices'));
    }
}
