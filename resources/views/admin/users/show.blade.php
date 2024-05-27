@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">Редактирование сотрудника</h2>
  <form action="{{ route('users.update', $user->id) }}" method="post" class="main__form form">
    @csrf
    @method('put')

    <div class="form__row">
      <label for="name" class="form__label">
        Ф.И.О. сотрудника
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') ?? $user->name }}" disabled>
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
        value="{{ old('login') ?? $user->login }}" disabled>
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
      <select class="form__input @error('position') form__input_error @enderror" id="position" name="position" disabled>
        <option value="admin" @selected(old('position') ?? $user->position == 'admin')>
          Администратор
        </option>
        <option value="master" @selected(old('position') ?? $user->position == 'master')>
          Мастер
        </option>
        <option value="seller" @selected(old('position') ?? $user->position == 'seller')>
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
      <input type="text" id="office_id" name="office_id"
        class="form__input @error('office_id') form__input_error @enderror"
        value="{{ old('office_id') ?? $user->office->name }}" disabled>
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
        value="{{ old('email') ?? $user->email }}" disabled>
      @error('email')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <a href="{{ route('users.edit', $user->id) }}" class="form__button_small">
      Редактировать
    </a>

  </form>
@endsection
