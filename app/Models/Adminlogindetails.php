<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Adminlogindetails extends Authenticatable
{
    protected $table="adminlogindetails";
    protected $primaryKey="admin_id";

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
