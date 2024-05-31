@extends('layouts.app')

@section('content')
  <table class="main__panel panel">
    <thead class="panel__thead">
      <th class="panel__th">№</th>
      <th class="panel__th panel__left">Услуга</th>
      <th class="panel__th">Цена</th>
    </thead>
    <tbody class="panel__tbody panel__left">
      @forelse($services as $service)
        <tr class="panel__tr panel__left">
          <td class="panel__td">{{ $loop->iteration }}</td>
          <td class="panel__td panel__left">{{ $service->name }}</td>
          <td class="panel__td">{{ $service->price }}</td>
        </tr>
      @empty
        <tr class="panel__tr panel__left">
          <td colspan="3" class="panel__td panel__left">
            Перечень услуг уточняйте у продавца
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
