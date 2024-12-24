<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'first_name',
        'last_name',
        'date',
        'time',
        'phone',
        'message',
        'status',
        'user_id'
    ];
    public $timestamps = true;
}
