@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Офисы
  </h2>

  <table class="main__panel">
    <thead>
      <th>ID</th>
      <th>Название офиса</th>
      <th>
        <a href="{{ route('offices.create') }}" class="form__button_small">
          Добавить
        </a>
      </th>
    </thead>
    <tbody>
      @forelse($offices as $office)
        <tr>
          <td>{{ $office->id }}</td>
          <td>{{ $office->name }}</td>
          <td>
            <a href="{{ route('offices.show', $office->id) }}" class="form__button_small">
              Просмотр
            </a>
            <a href="{{ route('offices.edit', $office->id) }}" class="form__button_small">
              Редактировать
            </a>
            <form action="{{ route('offices.destroy', $office->id) }}" method="post">
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
          <td colspan="3">Нет офисов</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
