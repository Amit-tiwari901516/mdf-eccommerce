<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'amount', 'response_code', 'transaction_id', 'auth_id', 'quantity', 'message_code', 'name_on_card',
        'address', 'city', 'postal_code', 'state', 'country'
    ];
}
