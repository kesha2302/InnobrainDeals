<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestActivatedlink extends Model
{
    protected $table = 'guestactivatedlink';
    protected $primaryKey = 'guestactivated_id';

    protected $fillable = [
        'guestorder_id',
        'product_ids',
        'activatedproductid',
    ];
}
