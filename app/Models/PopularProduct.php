<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularProduct extends Model
{
    protected $table="popularproduct";
    protected $primaryKey="popularproduct_id";

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
