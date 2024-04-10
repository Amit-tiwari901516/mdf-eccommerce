<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawerProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
        'price',
        'description',
        'type',
        'image'
    ];

    public function orders()
    {
        return $this->hasMany(Item::class);
    }
}
