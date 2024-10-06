<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_type',
        'code',
        'description',
        'minimum_balance',
        'interest_rate',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'minimum_balance' => 'decimal:2',
        'interest_rate' => 'decimal:2'
    ];
}
