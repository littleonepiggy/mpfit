<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\OrderService;
use App\Services\ProductService;


class HomeController extends Controller
{
        public function index(ProductService $service, OrderService $orderService)
    {
        $products = $service->get();
        $orders = $orderService->get();
        $categories = Category::all();
        
        return view('welcome', compact('products', 'orders', 'categories'));
    }

}
