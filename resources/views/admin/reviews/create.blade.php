@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.reviews.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}" placeholder="Имя">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" name="email" id="email" class="form__input @error('email') form__input_error @enderror"
        value="{{ old('email') }}" placeholder="Адрес электронной почты">
      @error('email')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <textarea name="text" id="text" rows="5" class="form__input @error('text') form__input_error @enderror"
        placeholder="Отзыв">{{ old('text') }}</textarea>
      @error('text')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="rating" class="form__label">
        Рейтинг
      </label>
      <input type="range" id="rating" name="rating" class="form__input @error('rating') form__input_error @enderror"
        value="{{ old('rating') }}" min="1" max="10" step="1">
      @error('rating')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <select name="status" id="status" class="form__select @error('status') form__input_error @enderror">
        <option selected disabled>
          Статус
        </option>
        <option @selected(old('status') == 'Новый')>
          Новый
        </option>
        <option @selected(old('status') == 'Модерация')>
          Модерация
        </option>
        <option @selected(old('status') == 'Опубликован')>
          Опубликован
        </option>
        <option @selected(old('status') == 'Отклонен')>
          Отклонен
        </option>
      </select>
      @error('status')
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
