<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawerPayment extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drawer_payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_id', 'amount', 'response_code', 'transaction_id', 'auth_id', 'quantity', 'message_code', 'message', 'payment_status', 'name_on_card',
        'address', 'city', 'postal_code', 'state', 'country'
    ];
}
