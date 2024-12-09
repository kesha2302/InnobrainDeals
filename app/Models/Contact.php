<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contactus';
    protected $primaryKey = 'contactus_id';

    protected $fillable = [
        'email',
        'contact1',
        'contact2',
    ];
}
