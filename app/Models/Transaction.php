<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'customer_id',
        'invoice_number',
        'transaction_number',
        'amount',
        'payment_date',
        'payment_method',
        'status',
    ];
}
