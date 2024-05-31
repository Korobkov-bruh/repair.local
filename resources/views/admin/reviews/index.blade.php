@extends('admin.layouts.app')

@section('content')
  <table class="main__panel">
    <thead class="panel__thead">
      <th class="panel__th">ID</th>
      <th class="panel__th">Имя</th>
      <th class="panel__th">Оценка</th>
      <th class="panel__th">Отзыв</th>
      <th class="panel__th">Статус</th>
      <th class="panel__th">
        <a href="{{ route('admin.reviews.create') }}" class="form__button_small panel__add">
          Добавить отзыв
        </a>
      </th>
    </thead>
    <tbody class="panel__tbody">
      @forelse($reviews as $review)
        <tr class="panel__tr">
          <td class="panel__td">{{ $review->id }}</td>
          <td class="panel__td">{{ $review->name }}</td>
          <td class="panel__td">{{ $review->rating }}</td>
          <td class="panel__td">{{ $review->text }}</td>
          <td class="panel__td">{{ $review->status }}</td>
          <td class="panel__td panel__buttons">
            <a href="{{ route('admin.reviews.show', $review->id) }}" class="form__button_small panel__link">
              Просмотр
            </a>
            <a href="{{ route('admin.reviews.edit', $review->id) }}" class="form__button_small panel__link">
              Редактировать
            </a>
            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="post" class="panel__link">
              @csrf
              @method('delete')

              <button type="submit" class="form__button_small">
                Удалить
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr class="panel__tr">
          <td colspan="6" class="panel__td">Нет отзывов</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
