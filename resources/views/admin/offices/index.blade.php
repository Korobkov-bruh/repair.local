@extends('admin.layouts.app')

@section('content')
  <table class="main__panel">
    <thead class="panel__thead">
      <th class="panel__th">ID</th>
      <th class="panel__th">Название офиса</th>
      <th class="panel__th">
        <a href="{{ route('admin.offices.create') }}" class="form__button_small panel__add">
          Добавить
        </a>
      </th>
    </thead>
    <tbody class="panel__tbody">
      @forelse($offices as $office)
        <tr class="panel__tr">
          <td class="panel__td">{{ $office->id }}</td>
          <td class="panel__td">{{ $office->name }}</td>
          <td class="panel__td panel__buttons">
            <a href="{{ route('admin.offices.show', $office->id) }}" class="form__button_small panel__link">
              Просмотр
            </a>
            <a href="{{ route('admin.offices.edit', $office->id) }}" class="form__button_small panel__link">
              Редактировать
            </a>
            <form action="{{ route('admin.offices.destroy', $office->id) }}" method="post" class="panel__link">
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
          <td colspan="3" class="panel__td">Нет офисов</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
