@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.details.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}" placeholder="Название поля">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" id="value" name="value" class="form__input @error('value') form__input_error @enderror"
        value="{{ old('value') }}" placeholder="Значение">
      @error('value')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <textarea name="description" id="description" rows="5"
        class="form__input @error('description') form__input_error @enderror" placeholder="Описание значения">{{ old('description') }}</textarea>
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
