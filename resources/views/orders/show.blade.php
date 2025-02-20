@extends('layouts.app')

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <p><strong>Покупатель:</strong> {{ $order->customer_name }}</p>
    <p><strong>Дата:</strong> {{ $order->order_date }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Итоговая цена:</strong> {{ $order->getTotalPrice() }} руб.</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
    @if ($order->status === 'новый')
        <form action="{{ route('orders.updateStatus', $order) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">Отметить как выполнен</button>
        </form>
    @endif
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection
