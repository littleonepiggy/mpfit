<?php

namespace App\Services;

use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;

class ProductService 
{

    public function get()
    {
        return Product::with('category')->get();
    }

    public function getById($id)
    {
        return Product::with('category')->findOrFail($id);
    }

    public function create(ProductStoreRequest $request)
    {
        $validated = $request->validated();
        return Product::create($validated);
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
    }
    public function update(ProductStoreRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $request = $request->validated();
        $product->update($request);
        return $product;
    }

}