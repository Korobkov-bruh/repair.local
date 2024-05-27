@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Заявки
  </h2>

  <table class="main__panel">
    <thead>
      <th>ID</th>
      <th>Дата заявки</th>
      <th>Модель оборудования</th>
      <th>Статус заявки</th>
      <th>
        <a href="{{ route('applications.create') }}" class="form__button_small">
          Добавить
        </a>
      </th>
    </thead>
    <tbody>
      @forelse($applications as $application)
        <tr>
          <td>{{ $application->id }}</td>
          <td>{{ $application->created_at }}</td>
          <td>{{ $application->model }}</td>
          <td>{{ $application->status }}</td>
          <td>
            <a href="{{ route('applications.show', $application->id) }}" class="form__button_small">
              Просмотр
            </a>
            <a href="{{ route('applications.edit', $application->id) }}" class="form__button_small">
              Редактировать
            </a>
            <form action="{{ route('applications.destroy', $application->id) }}" method="post">
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
          <td colspan="6">Нет офисов</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
