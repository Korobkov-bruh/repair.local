{{-- не авторизованный пользователь --}}
@guest
  <li class="header__item">
    <a href="{{ route('login') }}" class="header__link">
      Авторизация
    </a>
  </li>
@endguest

{{-- авторизованный пользователь --}}
@auth

  <li class="header__item">
    <a class="header__link header__link_active">
      {{ Auth::user()->name }}
    </a>
  </li>

  {{-- администратор --}}
  @can('admin')
    <li class="header__item">
      <a href="#" class="header__link">
        Настройки
      </a>
    </li>
    <li class="header__item">
      <a href="{{ route('services.index') }}" class="header__link">
        Услуги
      </a>
    </li>
    <li class="header__item">
      <a href="{{ route('reviews.index') }}" class="header__link">
        Отзывы
      </a>
    </li>
    <li class="header__item">
      <a href="{{ route('offices.index') }}" class="header__link">
        Офисы
      </a>
    </li>
  @endcan


  {{-- кнопка выход --}}
  <form action="{{ route('logout') }}" method="post">
    @csrf

    <button type="submit" class="header__link">
      Выход
    </button>
  </form>

@endauth
