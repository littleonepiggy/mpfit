<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Services\OrderService;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function store(OrderStoreRequest $request, OrderService $service)
    {
        $order = $service->create($request);

        return redirect()->route('order.show', ['id' => $order->id]);
    }

    public function show(OrderService $service, $id)
    {
        $order = $service->getById($id);
        $statuses = Status::all();

        return view('order.show', compact('order', 'statuses'));
    }

    public function update(OrderService $service, OrderUpdateRequest $request, $order_id)
    {
        $order = $service->update($request, $order_id);

        return redirect()->route('order.show', ['id' => $order->id]);
    }

}
