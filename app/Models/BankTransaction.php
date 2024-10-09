<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['bank_id', 'user_id', 'amount', 'transaction_type', 'status', 'submitted_requirements'];

    protected $casts = [
        'submitted_requirements' => 'array',
        'amount' => 'decimal:2',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
