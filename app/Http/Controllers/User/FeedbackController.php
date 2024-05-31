<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Detail;
use Illuminate\Support\Arr;

class FeedbackController extends Controller
{
    public function create()
    {
        $details = Detail::all('name', 'value')->toArray();

        $key = Arr::pluck($details, 'name');
        $value = Arr::pluck($details, 'value');

        $details = array_combine($key, $value);

        return view('user.feedback', compact('details'));
    }

    /**
     * Сохранение отзыва
     */
    public function store(StoreFeedbackRequest $request)
    {
        // создание записи из данных формы
        Review::create($request->except('status'));

        return redirect()
            ->route('user.feedbacks.create')
            ->with('success', 'Ваш отзыв успешно отправлен');
    }
}
