@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.offices.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}" placeholder="Название офиса">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" id="address" name="address"
        class="form__input @error('address') form__input_error @enderror" value="{{ old('address') }}"
        placeholder="Адрес офиса">
      @error('address')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" id="phone" name="phone" class="form__input @error('phone') form__input_error @enderror"
        value="{{ old('phone') }}" placeholder="Контактный телефон">
      @error('phone')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <textarea name="hours" id="hours" rows="5" class="form__input @error('hours') form__input_error @enderror"
        placeholder="Режим работы">{{ old('hours') }}</textarea>
      @error('hours')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" id="social" name="social" class="form__input @error('social') form__input_error @enderror"
        value="{{ old('social') }}" placeholder="Группа в социальных сетях">
      @error('social')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" name="map" id="map" class="form__input @error('map') form__input_error @enderror"
        value="{{ old('map') }}" placeholder="Ссылка на онлайн карту">
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
