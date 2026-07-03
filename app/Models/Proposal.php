<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'customer_id',
        'proposal_number',
        'title',
        'descripton',
        'amount',
        'status',
    ];
}
