@extends('layouts.app')

@section('content')
{{-- Вставляется на место @yield('content') --}}


<h2 class="main__title">Услуги</h2>
<a href="{{ route('services.create') }}">Добавить услугу</a>
<table class="main__panel">
    <thead>
        <th>ID</th>
        <th>Услуга</th>
        <th>Цена</th>
        <th>Примечание</th>
        <th></th>
    </thead>
    <tbody>
        @forelse($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->price }}</td>
            <td>{{ $service->note ?? '' }}</td>
            <td>
                <a href="{{ route('services.show', $service->id) }}">
                    Просмотр
                </a>
                <a href="{{ route('services.edit', $service->id) }}">
                    Редактировать
                </a>
                <form action="{{ route('services.destroy', $service->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit">
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