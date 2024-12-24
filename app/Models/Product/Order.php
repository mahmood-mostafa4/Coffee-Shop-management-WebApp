<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'address',
        'country',
        'city',
        'postcode',
        'phone',
        'email',
        'price',
        'user_id',
        'status'
    ];

    public $timestamps = true;
}
