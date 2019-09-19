@extends('layouts.app')
@section('title', 'Редактирование заказа')
@section('content')
<h1>Редактирование заказа #{{ $order->id }}</h1>
<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{ route('orders.update', $order->id) }}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="client_email">email_клиента:</label>
            <input type="text" class="form-control" name="client_email" value="{{ $order->client_email }}" />
        </div>
        <div class="form-group">
            <label for="partner_id">партнер</label>
            <select class="form-control" id="partner_id" value="{{ $order->partner_id }}" name="partner_id">
                @foreach ($partners as $index => $partner)
                    <option {{$index == $order->partner_id ? 'selected' : ''}} value="{{$index}}">{{$partner}}</option>
                @endforeach
            </select>
        </div>
        <ul>
            @foreach ($order->products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
        <div class="form-group">
            <label for="status">статус заказа</label>
            <select class="form-control" id="status" value="{{ $order->status }}" name="status">
                @foreach ($statuses as $index => $status)
                    <option {{$index == $order->status ? 'selected' : ''}} value="{{$index}}">{{$status}}</option>
                @endforeach
            </select>
        </div>

        <p>Стоимость заказа: {{$order->getPrice()}}</p>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
