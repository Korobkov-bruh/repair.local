@extends('admin.layouts.app')

@section('content')
  <table class="main__panel">
    <thead class="panel__thead">
      <th class="panel__th">ID</th>
      <th class="panel__th">Ф.И.О. сотрудника</th>
      <th class="panel__th">Должность</th>
      <th class="panel__th">Офис</th>
      <th class="panel__th">
        <a href="{{ route('admin.users.create') }}" class="form__button_small panel__add">
          Добавить
        </a>
      </th>
    </thead>
    <tbody class="panel__tbody">
      @forelse($users as $user)
        <tr class="panel__tr">
          <td class="panel__td">{{ $user->id }}</td>
          <td class="panel__td">{{ $user->name }}</td>
          <td class="panel__td">{{ $user->position }}</td>
          <td class="panel__td">{{ $user->office->name ?? '' }}</td>
          <td class="panel__td panel__buttons">
            <a href="{{ route('admin.users.show', $user->id) }}" class="form__button_small panel__link">
              Просмотр
            </a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="form__button_small panel__link">
              Редактировать
            </a>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="panel__link">
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
          <td colspan="5" class="panel__td">Нет сотрудников</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
