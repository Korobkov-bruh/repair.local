@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Настройки
  </h2>

  <table class="main__panel">
    <thead>
      <th>ID</th>
      <th>Название поля</th>
      <th>Значение</th>
      <th>Описание значения</th>
      <th>
        <a href="{{ route('details.create') }}" class="form__button_small">
          Добавить
        </a>
      </th>
    </thead>
    <tbody>
      @forelse($details as $detail)
        <tr>
          <td>{{ $detail->id }}</td>
          <td>{{ $detail->name }}</td>
          <td>{{ $detail->value }}</td>
          <td>{{ $detail->description }}</td>
          <td>
            <a href="{{ route('details.show', $detail->id) }}" class="form__button_small">
              Просмотр
            </a>
            <a href="{{ route('details.edit', $detail->id) }}" class="form__button_small">
              Редактировать
            </a>
            <form action="{{ route('details.destroy', $detail->id) }}" method="post">
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
          <td colspan="5">Нет настроек</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
