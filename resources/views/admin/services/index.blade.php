@extends('admin.layouts.app')

@section('content')
  <table class="main__panel panel">
    <thead class="panel__thead">
      <th class="panel__th">ID</th>
      <th class="panel__th">Услуга</th>
      <th class="panel__th">Цена</th>
      <th class="panel__th">Примечание</th>
      <th class="panel__th"> <a href="{{ route('admin.services.create') }}" class="panel__add">Добавить услугу</a></th>
    </thead>
    <tbody class="panel__tbody">
      @forelse($services as $service)
        <tr class="panel__tr">
          <td class="panel__td">{{ $service->id }}</td>
          <td class="panel__td">{{ $service->name }}</td>
          <td class="panel__td">{{ $service->price }}</td>
          <td class="panel__td">{{ $service->note ?? '' }}</td>
          <td class="panel__td panel__buttons">
            <a href="{{ route('admin.services.show', $service->id) }}" class="panel__link">
              Просмотр
            </a>
            <a href="{{ route('admin.services.edit', $service->id) }}"class="panel__link">
              Редактировать
            </a>
            <form action="{{ route('admin.services.destroy', $service->id) }}" method="post" class="panel__link">
              @csrf
              @method('delete')

              <button type="submit">
                Удалить
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr class="panel__tr">
          <td colspan="5" class="panel__td">Услуги не заданы</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
