@extends('admin.layouts.app')

@section('content')
  {{-- Вставляется на место @yield('content') --}}

  <h2 class="main__title">
    Заявок за месяц выполнено {{ $complete ?? 0 }}
  </h2>
@endsection
