<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table="products";
    protected $primaryKey="product_id";

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'discount_price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function popular()
    {
        return $this->hasMany('App\Models\PopularProduct', 'product_id', 'product_id');
    }
}
