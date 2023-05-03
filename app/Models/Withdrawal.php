<?php

namespace App\Models;

use App\Observers\WithdrawalObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getTypeAttribute()
    {
        return 2;
    }
}
