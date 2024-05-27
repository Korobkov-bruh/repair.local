@extends('layouts.app')

@section('content')
{{-- Вставляется на место @yield('content') --}}


<h2 class="main__title">Услуги</h2>
<a href="{{ route('services.create') }}">Добавить услугу</a>
<table class="main__panel panel">
    <thead>
        <th class="panel__th">ID</th>
        <th class="panel__th">Услуга</th>
        <th class="panel__th">Цена</th>
        <th class="panel__th">Примечание</th>
        <th class="panel__th"></th>
    </thead>
    <tbody>
        @forelse($services as $service)
        <tr class="panel__tr">
            <td class="panel__td">{{ $service->id }}</td>
            <td class="panel__td"> {{ $service->name }}</td>
            <td class="panel__td">{{ $service->price }}</td>
            <td class="panel__td">{{ $service->note ?? '' }}</td>
            <td class="panel__a">
                <a href="{{ route('services.show', $service->id) }}" class="panel__show">
                    Просмотр
                </a>
                <a href="{{ route('services.edit', $service->id) }}" class="panel__edit">
                    Редактировать
                </a>
                <form action="{{ route('services.destroy', $service->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit" class="panel__delete">
                        Удалить
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Услуги не заданы</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection