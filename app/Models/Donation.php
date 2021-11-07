<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable=[

        'charity_id',
        'donor_number',
        'category',
        'amount',
        'active'
    ];
}
