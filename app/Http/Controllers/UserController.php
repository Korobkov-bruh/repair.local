<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Office;

class UserController extends Controller
{
    /**
     * Список
     */
    public function index()
    {
        // получение данных
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Форма создания
     */
    public function create()
    {
        // офисы
        $offices = Office::all();
        return view('admin.users.create', compact('offices'));
    }

    /**
     * Сохранение
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Просмотр
     */
    public function show(string $id)
    {
        // получение записи по id
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Форма редактирования
     */
    public function edit(string $id)
    {
        // получение записи по id
        $user = User::findOrFail($id);
        // офисы
        $offices = Office::all();

        return view('admin.users.edit', compact('user', 'offices'));
    }

    /**
     * Обновление
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // получение записи по id
        $user = User::findOrFail($id);
        // пустое поле пароля
        if ($request->filled('password')) {
            $user->update($request->all());
        } else {
            $user->update($request->except('password'));
        }
        return redirect()->route('users.index');
    }

    /**
     * Удаление
     */
    public function destroy(string $id)
    {
        // получение записи по id
        $user = User::findOrFail($id);
        // удаление записи
        $user->delete();

        return redirect()->route('users.index');
    }
}
