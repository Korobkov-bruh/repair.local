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
    <a href="{{ route('welcome') }}" class="header__logo">
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
    <div class="footer__copy">
      &copy; Проноут, 2024
    </div>
  </footer>

</body>

</html>
