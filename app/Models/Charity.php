<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address',
        'email',
        'active',
        'phone',
        'postal_code',
        'city',
        'country'
    ];
}
