@extends('admin.layouts.app')

@section('content')
  <table class="main__panel">
    <thead class="panel__thead">
      <th class="panel__th">ID</th>
      <th class="panel__th">Название поля</th>
      <th class="panel__th">Значение</th>
      <th class="panel__th">Описание значения</th>
      <th class="panel__th">
        <a href="{{ route('admin.details.create') }}" class="form__button_small panel__add">
          Добавить
        </a>
      </th>
    </thead>
    <tbody class="panel__tbody">
      @forelse($details as $detail)
        <tr class="panel__tr">
          <td class="panel__td">{{ $detail->id }}</td>
          <td class="panel__td">{{ $detail->name }}</td>
          <td class="panel__td">{{ $detail->value }}</td>
          <td class="panel__td">{{ $detail->description }}</td>
          <td class="panel__td panel__buttons">
            <a href="{{ route('admin.details.show', $detail->id) }}" class="form__button_small panel__link">
              Просмотр
            </a>
            <a href="{{ route('admin.details.edit', $detail->id) }}" class="form__button_small panel__link">
              Редактировать
            </a>
            <form action="{{ route('admin.details.destroy', $detail->id) }}" method="post" class="panel__link">
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
          <td colspan="5" class="panel__td">Нет настроек</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
