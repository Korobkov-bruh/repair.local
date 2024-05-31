@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.services.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}" placeholder="Имя услуги">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="number" id="price" name="price" class="form__input @error('price') form__input_error @enderror"
        value="{{ old('price') }}" placeholder="Цена">
      @error('price')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <textarea name="note" id="note" rows="5" class="form__input @error('note') form__input_error @enderror"
        placeholder="Примечание">{{ old('note') }}</textarea>
      @error('note')
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
