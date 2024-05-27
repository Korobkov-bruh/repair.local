@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">Редактирование офиса</h2>
  <form action="{{ route('offices.update', $office->id) }}" method="post" class="main__form form">
    @csrf
    @method('put')

    <div class="form__row">
      <label for="name" class="form__label">
        Название офиса
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') ?? $office->name }}">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="address" class="form__label">
        Адрес офиса
      </label>
      <input type="text" id="address" name="address"
        class="form__input @error('address') form__input_error @enderror"
        value="{{ old('address') ?? $office->address }}">
      @error('address')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="phone" class="form__label">
        Контактный телефон
      </label>
      <input type="text" id="phone" name="phone" class="form__input @error('phone') form__input_error @enderror"
        value="{{ old('phone') ?? $office->phone }}">
      @error('phone')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="hours" class="form__label">
        Режим работы
      </label>
      <textarea name="hours" id="hours" rows="5" class="form__input @error('hours') form__input_error @enderror">{{ old('hours') ?? $office->hours }}</textarea>
      @error('hours')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="social" class="form__label">
        Группа в социальных сетях
      </label>
      <input type="text" id="social" name="social" class="form__input @error('social') form__input_error @enderror"
        value="{{ old('social') ?? $office->social }}">
      @error('social')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="map" class="form__label">
        Ссылка на онлайн карту
      </label>
      <input type="text" name="map" id="map" class="form__input @error('map') form__input_error @enderror"
        value="{{ old('map') ?? $office->map }}">
      @error('map')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="form__button">
      Сохранить
    </button>

  </form>
@endsection
