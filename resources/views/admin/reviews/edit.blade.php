@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.reviews.update', $review->id) }}" method="post" class="main__form form">
    @csrf
    @method('put')

    <div class="form__row">
      <label for="name" class="form__label">
        Имя
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') ?? $review->name }}">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="text" class="form__label">
        Отзыв
      </label>
      <textarea name="text" id="text" rows="5" class="form__input @error('text') form__input_error @enderror">{{ old('text') ?? $review->text }}</textarea>
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
        value="{{ old('rating') ?? $review->rating }}" min="1" max="10" step="1">
      @error('rating')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="email" class="form__label">
        Адрес электронной почты
      </label>
      <input type="email" name="email" id="email" class="form__input @error('email') form__input_error @enderror"
        value="{{ old('email') ?? $review->email }}">
      @error('email')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="status" class="form__label">
        Статус
      </label>
      <select name="status" id="status" class="form__select @error('status') form__input_error @enderror">
        <option @selected(old('status') ?? $review->status == 'Новый')>
          Новый
        </option>
        <option @selected(old('status') ?? $review->status == 'Модерация')>
          Модерация
        </option>
        <option @selected(old('status') ?? $review->status == 'Опубликован')>
          Опубликован
        </option>
        <option @selected(old('status') ?? $review->status == 'Отклонен')>
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
