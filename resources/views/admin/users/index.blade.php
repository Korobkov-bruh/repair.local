@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Сотрудники
  </h2>

  <table class="main__panel">
    <thead>
      <th>ID</th>
      <th>Ф.И.О. сотрудника</th>
      <th>Должность</th>
      <th>Офис</th>
      <th>
        <a href="{{ route('users.create') }}" class="form__button_small">
          Добавить
        </a>
      </th>
    </thead>
    <tbody>
      @forelse($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->position }}</td>
          <td>{{ $user->office->name }}</td>
          <td>
            <a href="{{ route('users.show', $user->id) }}" class="form__button_small">
              Просмотр
            </a>
            <a href="{{ route('users.edit', $user->id) }}" class="form__button_small">
              Редактировать
            </a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
              @csrf
              @method('delete')

              <button type="submit" class="form__button_small">
                Удалить
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5">Нет сотрудников</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
