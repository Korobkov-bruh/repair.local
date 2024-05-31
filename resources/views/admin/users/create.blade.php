@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.users.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}" placeholder="Ф.И.О. сотрудника">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

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
      <select class="form__input @error('position') form__input_error @enderror" id="position" name="position">
        <option selected disabled>
          Должность
        </option>
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
      <select class="form__input @error('position') form__input_error @enderror" id="office_id" name="office_id">
        <option selected disabled>
          Офис
        </option>
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
      <input type="text" id="email" name="email" class="form__input @error('email') form__input_error @enderror"
        value="{{ old('email') }}" placeholder="Адрес электронной почты">
      @error('email')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="password" id="password" name="password"
        class="form__input @error('password') form__input_error @enderror" value="{{ old('password') }}"
        placeholder="Пароль">
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
