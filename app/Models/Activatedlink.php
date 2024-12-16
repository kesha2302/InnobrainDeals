<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activatedlink extends Model
{
    protected $table = 'activatedlink';
    protected $primaryKey = 'activated_id';

    protected $fillable = [
        'order_id',
        'product_ids',
        'activatedproductid',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'customer_id', 'customer_id');
    }
}
