@extends('layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">Просмотр заявки</h2>
  <div class="main__form form">
    @csrf

    <div class="form__row">
      <label for="created_at" class="form__label">
        Дата заявки
      </label>
      <input type="text" id="created_at" name="created_at"
        class="form__input @error('created_at') form__input_error @enderror" value="{{ $application->created_at }}"
        disabled>
      @error('created_at')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="model" class="form__label">
        Модель оборудования
      </label>
      <input type="text" id="model" name="model" class="form__input @error('model') form__input_error @enderror"
        value="{{ $application->model }} " disabled>
      @error('model')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="fault" class="form__label">
        Описание неисправности
      </label>
      <textarea name="fault" id="fault" rows="5" class="form__input @error('fault') form__input_error @enderror"
        disabled>{{ $application->fault }}</textarea>
      @error('fault')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="customer" class="form__label">
        Ф.И.О. заказчика
      </label>
      <input type="text" id="customer" name="customer"
        class="form__input @error('customer') form__input_error @enderror" value="{{ $application->customer }}" disabled>
      @error('customer')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="status" class="form__label">
        Статус заявки
      </label>
      <select name="status" id="status" class="form__select @error('status') form__input_error @enderror" disabled>
        <option @selected(old('status') ?? $application->status == 'Ремонт')>
          Ремонт
        </option>
        <option @selected(old('status') ?? $application->status == 'Согласование')>
          Согласование
        </option>
        <option @selected(old('status') ?? $application->status == 'Выполнен')>
          Выполнен
        </option>
      </select>
      @error('status')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="user_id" class="form__label">
        Мастер
      </label>
      <input type="text" id="user_id" name="user_id"
        class="form__input @error('user_id') form__input_error @enderror" value="{{ $application->user->name }}" disabled>
      </select>
      @error('user_id')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="completion" class="form__label">
        Дата завершения ремонта
      </label>
      <input type="date" id="completion" name="completion"
        class="form__input @error('completion') form__input_error @enderror" value="{{ $application->completion }}"
        disabled>
      @error('completion')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <a href="{{ route('applications.edit', $application->id) }}" class="form__button_small">
      Редактировать
    </a>

    </form>
  @endsection
