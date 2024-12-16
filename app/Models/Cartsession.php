<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartsession extends Model
{
    protected $table = 'cartsession';
    protected $primaryKey = 'cartsession_id';

    protected $fillable = [
        'customer_id',
        'product_ids',
        'image',
        'name',
        'price',
        'discount_price',

    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'customer_id');
    }
}
