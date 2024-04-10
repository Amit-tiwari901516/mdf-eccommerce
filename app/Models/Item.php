<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'drawer_order_id',
        'drawer_product_id',
        'height',
        'height_in',
        'width',
        'width_in',
        'depth',
        'depth_in',
        'price',
        'note',
        'design',
        'quantity',
    ];

    public function product()
    {
        return  $this->hasOne(DrawerProduct::class, 'id', 'drawer_product_id');
    }

    public function order()
    {
        return $this->belongsTo(DrawerOrder::class, 'id', 'drawer_order_id');
    }
}
