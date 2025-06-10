<?php

namespace App\Services;

use App\Models\Order;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;

class OrderService 
{

    public function get()
    {
        return Order::with(['status', 'product'])->get();
    }

    public function getById($id)
    {
        return Order::with(['status', 'product'])->findOrFail($id);
    }

    public function create(OrderStoreRequest $request)
    {
        $validated = $request->validated();

        return Order::create($validated);
    }

    public function update(OrderUpdateRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validated();
        $order->update($validated);
        return $order;
    }

}