<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    protected $table='facilities';
    protected $fillable =[
        'name',
        'description',
    ];
}
