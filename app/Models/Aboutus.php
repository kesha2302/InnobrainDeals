<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aboutus extends Model
{
    use SoftDeletes;

    protected $table = 'aboutus';
    protected $primaryKey = 'aboutus_id';

    protected $fillable = [
        'title',
        'description1',
        'description2',
    ];
}
