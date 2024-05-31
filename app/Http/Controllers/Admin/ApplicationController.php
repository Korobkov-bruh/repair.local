<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\User;

class ApplicationController extends Controller
{
    /**
     * Вывод списка
     */
    public function index()
    {
        // получение данных с сортировкой по полю number
        $applications = Application::orderByDesc('created_at')->get();

        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Форма добавления
     */
    public function create()
    {
        $masters = User::where('position', 'master')->get();
        return view('admin.applications.create', compact('masters'));
    }

    /**
     * Сохранение
     */
    public function store(StoreApplicationRequest $request)
    {
        // создание записи из данных формы
        Application::create($request->all());

        return redirect()->route('admin.applications.index');
    }

    /**
     * Просмотр
     */
    public function show(string $id)
    {
        // получение записи по id
        $application = Application::findOrFail($id);

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Форма для редактирования
     */
    public function edit(string $id)
    {
        // получение мастеров
        $masters = User::where('position', 'master')->get();

        // получение записи по id
        $application = Application::findOrFail($id);

        return view('admin.applications.edit', compact('application', 'masters'));
    }

    /**
     * Обновление
     */
    public function update(UpdateApplicationRequest $request, string $id)
    {
        // получение записи по id
        $application = Application::findOrFail($id);
        // обновление записи по данным формы
        $application->update($request->all());

        return redirect()->route('admin.applications.index');
    }

    /**
     * Удаление
     */
    public function destroy(string $id)
    {
        // получение записи по id
        $application = Application::findOrFail($id);
        // удаление записи
        $application->delete();

        return redirect()->route('admin.applications.index');
    }
}
