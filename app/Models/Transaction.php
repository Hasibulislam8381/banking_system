<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Add user_id to the fillable attributes
        'amount',
        'transaction_type',
        'date',
        // Add other attributes as needed
    ];
}
