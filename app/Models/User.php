<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';


    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'user_phone',
        'user_email',
        'user_pass',
        'user_billing_fname',
        'user_billing_lname',
        'user_billing_company',
        'user_billing_po',
        'user_billing_tax',
        'user_billing_address',
        'user_billing_city',
        'user_billing_postal',
        'user_billing_phone',
        'user_billing_email',
        'user_billing_country'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_pass',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(DrawerOrder::class, 'user_id');
    }
}
