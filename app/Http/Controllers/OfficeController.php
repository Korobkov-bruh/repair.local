<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;

class OfficeController extends Controller
{
    /**
     * Список
     */
    public function index()
    {
        // получение данных с сортировкой по полю number
        $offices = Office::all();

        return view('admin.offices.index', compact('offices'));
    }

    /**
     * Форма для добавления
     */
    public function create()
    {
        return view('admin.offices.create');
    }

    /**
     * Сохранение
     */
    public function store(StoreOfficeRequest $request)
    {
        // создание записи из данных формы
        Office::create($request->all());

        return redirect()->route('offices.index');
    }

    /**
     * Просмотр
     */
    public function show(string $id)
    {
        // получение записи по id
        $office = Office::findOrFail($id);

        return view('admin.offices.show', compact('office'));
    }

    /**
     * Форма редактирования
     */
    public function edit(string $id)
    {
        // получение записи по id
        $office = Office::findOrFail($id);

        return view('admin.offices.edit', compact('office'));
    }

    /**
     * Обновление
     */
    public function update(UpdateOfficeRequest $request, string $id)
    {
        // получение записи по id
        $office = Office::findOrFail($id);
        // обновление записи по данным формы
        $office->update($request->all());

        return redirect()->route('offices.index');
    }

    /**
     * Удаление
     */
    public function destroy(string $id)
    {
        // получение записи по id
        $office = Office::findOrFail($id);
        // удаление записи
        $office->delete();

        return redirect()->route('offices.index');
    }
}
