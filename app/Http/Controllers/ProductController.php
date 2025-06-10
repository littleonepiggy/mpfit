<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use App\Http\Requests\ProductStoreRequest;

use App\Services\ProductService;

class ProductController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductService $service, ProductStoreRequest $request)
    {
        $product = $service->create($request);

        return redirect()->route('product.show', ['id' => $product->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductService $service, $id)
    {
        $product = $service->getById($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductService $service, $id)
    {
        $product = $service->getById($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductService $service, ProductStoreRequest $request, $product_id)
    {
        $service->update($request, $product_id);

        return redirect()->route('product.show', ['id' => $product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductService $service, $product_id)
    {
        $service->delete($product_id);

        return redirect('/');
    }
}
