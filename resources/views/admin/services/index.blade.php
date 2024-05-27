@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Услуги
  </h2>

  <table class="main__panel">
    <thead>
      <th>ID</th>
      <th>Услуга</th>
      <th>Цена</th>
      <th>
        <a href="{{ route('services.create') }}" class="form__button_small">
          Добавить услугу
        </a>
      </th>
    </thead>
    <tbody>
      @forelse($services as $service)
        <tr>
          <td>{{ $service->id }}</td>
          <td>{{ $service->name }}</td>
          <td>{{ $service->price }}</td>
          <td>
            <a href="{{ route('services.show', $service->id) }}" class="form__button_small">
              Просмотр
            </a>
            <a href="{{ route('services.edit', $service->id) }}" class="form__button_small">
              Редактировать
            </a>
            <form action="{{ route('services.destroy', $service->id) }}" method="post">
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
          <td colspan="4">Услуги не заданы</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
