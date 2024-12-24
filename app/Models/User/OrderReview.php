<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReview extends Model
{
    use HasFactory;
    protected $table = 'order_review';
    protected $fillable = [
        'first_name',
        'last_name',
        'review',
        'user_id'
    ];
    public $timestamps = true;
}
