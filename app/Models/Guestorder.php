<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guestorder extends Model
{
    protected $table = 'guest_orders';
    protected $primaryKey = 'gid';

    protected $fillable = [
        'guestorder_id',
        'product_ids',
        'product_name',
        'quantity',
        'price',
        'total_cost',
    ];
}
