<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'specie',
        'thickness',
        'height',
        'width',
        'depth',
        'price'
    ];
}
