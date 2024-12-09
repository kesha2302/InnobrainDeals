<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkoutdetails';
    protected $primaryKey = 'checkout_id';

    protected $fillable = [
        'customer_id',
        'order_id',
        'name',
        'email',
        'contact',
        'payment_id',
        'total_cost',

    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'customer_id');
    }
}
