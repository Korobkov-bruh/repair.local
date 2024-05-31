<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Проноут</title>

  @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body class="container">

  <header class="header">
    <a href="{{ route('user.index') }}" class="header__logo">
      Проноут
    </a>
    <nav class="header__menu">
      <ul class="header__items">
        @include('layouts.menu')
      </ul>
    </nav>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer class="footer">
    <div class="footer__items">
      <div class="footer__copy">
        {{ $details['name'] ?? '' }} &copy; 2021
      </div>
      <div class="footer__icq">
        ICQ: {{ $details['icq'] ?? '' }}
      </div>
      <div class="footer__inn">
        ИНН: {{ $details['inn'] ?? '' }}
      </div>
      <div class="footer__logo">
        <img src="{{ asset('img/vk-logo.svg') }}" alt="" class="d-inline-block align-text-top">
      </div>
    </div>
  </footer>

</body>

</html>
