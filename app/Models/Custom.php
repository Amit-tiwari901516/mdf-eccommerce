<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    use HasFactory;

    protected $fillable = [
        'online_sequence_code', 'sales_order_code', 'purchase_order_code', 'packing_slip_code', 'markup_price'
    ];
}
