<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
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
        return 1;
    }
}
