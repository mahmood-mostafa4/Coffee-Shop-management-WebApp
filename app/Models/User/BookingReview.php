<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingReview extends Model
{
    use HasFactory;
    protected $table = 'booking_review';
    protected $fillable = [
        'first_name',
        'last_name',
        'review',
        'user_id'
    ];
    public $timestamps = true;
}
