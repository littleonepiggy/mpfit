<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'fio',
        'product_id',
        'quantity',
        'status_id'
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $product = Product::findOrFail($order->product_id);
            $order->total_price = $product->price * $order->quantity;
            $order->status_id = 1;
        });
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
