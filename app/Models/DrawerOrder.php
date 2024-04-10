<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DrawerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'unit',
        'bottom_thickness_grain_direction',
        'back_notch_drill_undermount_slide',
        'front_notch_undermount_slide',
        'bracket',
        'logo_branded',
        'brand_logo',
        'total',
        'status',
        'invoice',
        'sales_invoice',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_city',
        'shipping_country',
        'shipping_postal_code',
        'shipping_address',
        'reference_no',
        'data'
    ];

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }


    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
