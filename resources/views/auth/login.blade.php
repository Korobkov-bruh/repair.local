@extends('admin.layouts.app')

@section('content')
  <!--Форма авторизации-->
  <form class="main__form form" action="{{ route('login') }}" method="post">
    @csrf

    <div class="form__row">
      <input type="text" id="login" name="login" class="form__input @error('login') form__input_error @enderror"
        value="{{ old('login') }}" placeholder="Логин">
      @error('login')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="password" id="password" name="password"
        class="form__input
        @error('password') form__input_error @enderror" placeholder="Пароль">
      @error('password')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="remember" class="form__label">
        <input type="checkbox" id="remember" name="remember" class="form__checkbox" @checked(old('remember'))>
        Запомнить меня
      </label>
    </div>

    <button type="submit" class="form__button">
      Войти
    </button>

  </form>
@endsection
