<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = ["name", "category_id", "description", "price"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
        