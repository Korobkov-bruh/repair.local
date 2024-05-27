@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Отзывы
  </h2>

  <table class="main__panel">
    <thead>
      <th>ID</th>
      <th>Имя</th>
      <th>Оценка</th>
      <th>Отзыв</th>
      <th>Статус</th>
      <th>
        <a href="{{ route('reviews.create') }}" class="form__button_small">
          Добавить отзыв
        </a>
      </th>
    </thead>
    <tbody>
      @forelse($reviews as $review)
        <tr>
          <td>{{ $review->id }}</td>
          <td>{{ $review->name }}</td>
          <td>{{ $review->rating }}</td>
          <td>{{ $review->text }}</td>
          <td>{{ $review->status }}</td>
          <td>
            <a href="{{ route('reviews.show', $review->id) }}" class="form__button_small">
              Просмотр
            </a>
            <a href="{{ route('reviews.edit', $review->id) }}" class="form__button_small">
              Редактировать
            </a>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
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
          <td colspan="6">Нет отзывов</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
