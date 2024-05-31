@extends('layouts.app')

@section('content')
<section class="main__leader leader">
    <div class="leader__service service">
        <div class="service__items">
            <div class="service__item">
                <p>
                    У нас Вы можете заказать практически любой товар на выбор, любой ценовой категории
                </p>
            </div>
            <div class="service__item">
                <p>
                    Мы можем выполнить любой ремонт компьютерной и офисной техники
                </p>
            </div>
            <div class="service__item">
                <p>
                    Заправим картридж, напечатаем фотографии, выполним обслуживание и много другое ...
                </p>
            </div>
        </div>
    </div>
    <!-- Услуги -->

    <!-- Офисы -->
    <div class="leader__offices offices">
        <div class="offices__items">
            @forelse($offices as $office)
            <div class="offices__item">
                <div class="offices__conteiner">
                    <h4 class="offices__title">
                        {{ $office->name }}
                    </h4>

                    @isset($office->map)
                    <div class="offices__map">
                        {!! $office->map !!}
                    </div>
                    @endisset

                    <ul class="offices__ul">

                        <li class="offices__li">
                            <b>Адрес:</b> {{ $office->address }}
                        </li>

                        <li class="offices__li">
                            <b>График работы:</b> {{ $office->hours }}
                        </li>

                        @isset($office->phone)
                        <li class="offices__li">
                            <b>Телефон:</b> {{ $office->phone }}
                        </li>
                        @endisset

                        @isset($office->social)
                        <li class="offices__li">
                            <a class="offices__link" href="{{ $office->social }}">
                                {{ $office->social }}
                            </a>
                        </li>
                        @endisset

                    </ul>
                </div>

            </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- Офисы -->

    <!-- Отзывы -->
    <div class="leader__reviews reviews">
        <div class="reviews__container">
            <div class="reviews__items">
                @forelse($reviews as $review)
                <div class="reviews__item">
                    <h5 class="reviews__title">{{ $review->name ?? 'Неизвестный пользователь' }} в {{
                        $review->created_at }}
                    </h5>
                    <p class="reviews__text">{{ $review->text }}</p>
                    <p class="reviews__rating">Оценка: {{ $review->rating }} из 5</p>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- Отзывы -->
@endsection