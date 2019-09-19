@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="{{ route('weather.index') }}">Температура в Брянске</a>
                <a href="{{ route('orders.index') }}">Список заказов</a>
            </div>
        </div>
    </div>
@endsection
