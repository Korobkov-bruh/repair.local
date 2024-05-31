{{-- открытая часть  --}}

<li class="header__item">
  <a href="{{ route('user.price') }}" class="header__link">
    Прайс-лист
  </a>
</li>

<li class="header__item">
  <a href="{{ route('user.status') }}" class="header__link">
    Статус ремонта
  </a>
</li>

<li class="header__item">
  <a href="{{ route('user.feedbacks.create') }}" class="header__link">
    Отзывы
  </a>
</li>

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
    <a href="{{ route('admin.home') }}" class="header__link">
      Панель администратора
    </a>
  </li>

  {{-- кнопка выход --}}
  <form action="{{ route('logout') }}" method="post">
    @csrf

    <button type="submit" class="header__link">
      Выход
    </button>
  </form>

@endauth
