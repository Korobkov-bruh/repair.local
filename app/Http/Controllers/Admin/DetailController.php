<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Detail;
use App\Http\Requests\StoreDetailRequest;
use App\Http\Requests\UpdateDetailRequest;

class DetailController extends Controller
{
    /**
     * Список
     */
    public function index()
    {
        // получение данных
        $details = Detail::all();

        return view('admin.details.index', compact('details'));
    }

    /**
     * Форма создания
     */
    public function create()
    {
        return view('admin.details.create');
    }

    /**
     * Сохранение
     */
    public function store(StoreDetailRequest $request)
    {
        // создание записи из данных формы
        Detail::create($request->all());

        return redirect()->route('admin.details.index');
    }

    /**
     * Просмотр
     */
    public function show(string $id)
    {
        // получение записи по id
        $detail = Detail::findOrFail($id);

        return view('admin.details.show', compact('detail'));
    }

    /**
     * Форма редактирования
     */
    public function edit(string $id)
    {
        // получение записи по id
        $detail = Detail::findOrFail($id);

        return view('admin.details.edit', compact('detail'));
    }

    /**
     * Обновление
     */
    public function update(UpdateDetailRequest $request, string $id)
    {
        // получение записи по id
        $detail = Detail::findOrFail($id);
        // обновление записи по данным формы
        $detail->update($request->all());

        return redirect()->route('admin.details.index');
    }

    /**
     * Удаление
     */
    public function destroy(string $id)
    {
        // получение записи по id
        $detail = Detail::findOrFail($id);
        // удаление записи
        $detail->delete();

        return redirect()->route('admin.details.index');
    }
}
