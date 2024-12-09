<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guestuser extends Model
{
    protected $table = 'guest_user';
    protected $primaryKey = 'guest_id';

    protected $fillable = [
        'guestorder_id',
        'name',
        'email',
        'contact',
        'payment_id',
        'total_cost',
    ];
}
