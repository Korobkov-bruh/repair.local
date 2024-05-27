@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">Добавление сотрудника</h2>
  <form action="{{ route('users.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <label for="name" class="form__label">
        Ф.И.О. сотрудника
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="name" class="form__label">
        Логин
      </label>
      <input type="text" id="login" name="login" class="form__input @error('login') form__input_error @enderror"
        value="{{ old('login') }}">
      @error('login')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="position" class="form__label">
        Должность
      </label>
      <select class="form__input @error('position') form__input_error @enderror" id="position" name="position">
        <option value="admin" @selected(old('position') == 'admin')>
          Администратор
        </option>
        <option value="master" @selected(old('position') == 'master')>
          Мастер
        </option>
        <option value="seller" @selected(old('position') == 'seller')>
          Продавец
        </option>
      </select>
      @error('position')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="office_id" class="form__label">
        Офис
      </label>
      <select class="form__input @error('position') form__input_error @enderror" id="office_id" name="office_id">
        @forelse($offices as $office)
          <option value="{{ $office->id }}" @selected(old('office_id') == $office->id)>
            {{ $office->name }}
          </option>
        @empty
        @endforelse
      </select>
      @error('office_id')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="email" class="form__label">
        Адрес электронной почты
      </label>
      <input type="text" id="email" name="email" class="form__input @error('email') form__input_error @enderror"
        value="{{ old('email') }}">
      @error('email')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="password" class="form__label">
        Пароль
      </label>
      <input type="password" id="password" name="password"
        class="form__input @error('password') form__input_error @enderror" value="{{ old('password') }}">
      @error('password')
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
