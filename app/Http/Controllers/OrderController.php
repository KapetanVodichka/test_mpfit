<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Отображает список заказов.
     */
    public function index()
    {
        $orders = Order::with('product')->get(['id', 'order_date', 'customer_name', 'status', 'quantity', 'product_id']);
        return view('orders.index', compact('orders'));
    }

    /**
     * Отображает форму для создания нового заказа.
     */
    public function create()
    {
        $products = Product::all(['id', 'name', 'price']);
        return view('orders.create', compact('products'));
    }

    /**
     * Сохраняет новый заказ в базе данных.
     */
    public function store(StoreOrderRequest $request)
    {
        $orderData = $request->validated();
        $orderData['status'] = 'новый'; // Устанавливаем статус по умолчанию
        $order = Order::create($orderData);
        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан.');
    }

    /**
     * Отображает полную информацию о заказе.
     */
    public function show(Order $order)
    {
        $order->load('product');
        return view('orders.show', compact('order'));
    }

    /**
     * Обновляет статус заказа на "выполнен".
     */
    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => 'выполнен']);
        return redirect()->route('orders.show', $order)->with('success', 'Статус заказа обновлен на "выполнен".');
    }
}
