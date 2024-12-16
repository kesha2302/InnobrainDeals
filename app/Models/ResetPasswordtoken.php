<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordtoken extends Model
{
    protected $table="resetpassword_token";
    protected $primaryKey="id";

    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];
}
