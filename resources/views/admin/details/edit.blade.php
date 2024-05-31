@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.details.update', $detail->id) }}" method="post" class="main__form form">
    @csrf
    @method('put')

    <div class="form__row">
      <label for="name" class="form__label">
        Название поля
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') ?? $detail->name }}">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="value" class="form__label">
        Значение
      </label>
      <input type="text" id="value" name="value" class="form__input @error('value') form__input_error @enderror"
        value="{{ old('value') ?? $detail->value }}">
      @error('value')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="description" class="form__label">
        Описание значения
      </label>
      <textarea name="description" id="description" rows="5"
        class="form__input @error('description') form__input_error @enderror">{{ old('description') ?? $detail->description }}</textarea>
      @error('description')
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
