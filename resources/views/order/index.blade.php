@extends('layouts.app')
@section('title', 'Список заказов')
@section('content')
<h1>Список заказов</h1>
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ид_заказа</th>
        <th scope="col">название_партнера</th>
        <th scope="col">стоимость_заказа</th>
        <th scope="col">наименование_состав_заказа</th>
        <th scope="col">статус_заказа</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td><a href="{{ route('orders.edit', ['id' => $order->id]) }}">{{$order->id}}</a></td>
            <td>{{$order->partner->name}}</td>
            <td>{{$order->getPrice()}}</td>
            <td>{{$order->getProductNames()}}</td>
            <td>{{$order->getStatus()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
