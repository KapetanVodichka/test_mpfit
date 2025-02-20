<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Отображает список товаров с сокращенной информацией.
     */
    public function index()
    {
        $products = Product::with('category')->get(['id', 'name', 'price', 'category_id']);
        return view('products.index', compact('products'));
    }

    /**
     * Отображает форму для создания нового товара.
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('products.create', compact('categories'));
    }

    /**
     * Сохраняет новый товар в базе данных.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Товар успешно добавлен.');
    }

    /**
     * Отображает полную информацию о товаре.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    /**
     * Отображает форму для редактирования товара.
     */
    public function edit(Product $product)
    {
        $categories = Category::all(['id', 'name']);
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Обновляет информацию о товаре в базе данных.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Товар успешно обновлен.');
    }

    /**
     * Удаляет товар из базы данных.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Товар успешно удален.');
    }
}
