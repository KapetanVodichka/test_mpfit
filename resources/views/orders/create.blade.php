@extends('layouts.app')

@section('content')
    <h1>Создать заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_name">ФИО покупателя</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="product_id">Товар</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }} руб.)</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Количество</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea name="comment" id="comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
