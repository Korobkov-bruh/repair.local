@extends('admin.layouts.app')

@section('content')
  <form action="{{ route('admin.applications.store') }}" method="post" class="main__form form">
    @csrf

    <div class="form__row">
      <input type="text" id="created_at" name="created_at"
        class="form__input @error('created_at') form__input_error @enderror" value="{{ old('created_at') }}" disabled
        placeholder="Дата заявки">
      @error('created_at')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" id="model" name="model" class="form__input @error('model') form__input_error @enderror"
        value="{{ old('model') }}" placeholder="Модель оборудования">
      @error('model')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <textarea name="fault" id="fault" rows="5" class="form__input @error('fault') form__input_error @enderror"
        placeholder="Описание неисправности">{{ old('fault') }}</textarea>
      @error('fault')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <input type="text" id="customer" name="customer"
        class="form__input @error('customer') form__input_error @enderror" value="{{ old('customer') }}"
        placeholder="Ф.И.О. заказчика">
      @error('customer')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <select name="status" id="status" class="form__select @error('status') form__input_error @enderror">
        <option disabled selected>
          Статус заявки
        </option>
        <option @selected(old('status') == 'Ремонт')>
          Ремонт
        </option>
        <option @selected(old('status') == 'Согласование')>
          Согласование
        </option>
        <option @selected(old('status') == 'Выполнен')>
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
      <select name="user_id" id="user_id" class="form__select @error('user_id') form__input_error @enderror">
        <option disabled selected>
          Мастер
        </option>
        @forelse($masters as $master)
          <option value="{{ $master->id }}" @selected(old('user_id') == $master->id)>
            {{ $master->name }}
          </option>
        @empty
        @endforelse
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
        class="form__input @error('completion') form__input_error @enderror" value="{{ old('completion') }}">
      @error('completion')
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
