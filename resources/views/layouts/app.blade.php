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
    @include('layouts.menu')
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer class="footer">

  </footer>

</body>

</html>
