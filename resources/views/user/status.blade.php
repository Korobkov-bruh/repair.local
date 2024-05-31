@extends('layouts.app')

@section('content')
  <form action="{{ route('user.status') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="id" name="id" class="form__input @error('id') form__input_error @enderror"
        value="{{ old('id') }}" placeholder="Номер заказа">
      @error('id')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="form__button">
      Проверить
    </button>

  </form>

  <div class="main__status status">
    @isset($application)
      @csrf
      <div class="status__item">
        <h2 class="status__title">
          Заказ № {{ $application->id }}
        </h2>
        <p class="status__text">
          {{ $application->status }}
        </p>
      </div>
    @endisset
  </div>
@endsection
