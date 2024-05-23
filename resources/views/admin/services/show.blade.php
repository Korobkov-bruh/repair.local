@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">Редактирование услуги</h2>
  <form action="#" method="post" class="main__form form">



    <div class="form__row">
      <label for="name" class="form__label">
        Имя услуги
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') ?? $service->name }}" readonly>
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="price" class="form__label">
        Цена
      </label>
      <input type="number" id="price" name="price" class="form__input @error('price') form__input_error @enderror"
        value="{{ old('price') ?? $service->price }}" min="0" readonly>
      @error('price')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="note" class="form__label">
        Примечание
      </label>
      <textarea name="note" id="note" rows="5" class="form__input @error('note') form__input_error @enderror"
        readonly>{{ old('note') ?? $service->note }}</textarea>
      @error('note')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <a href="{{ route('services.edit', $service->id) }}">
      Редактировать
    </a>

  </form>
@endsection
