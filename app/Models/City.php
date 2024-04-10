<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable  = [
        'city',
        'courier',
        'min',
        'zero',
        '500',
        '1000',
        '2000',
        '5000',
        '10000'
    ];
}
