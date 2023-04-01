<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['balance'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function balance()
    {
        $total_deposits = $this->deposits()->where('status', 4)->sum('cookies');
        $total_withdrawals = $this->withdrawals()->where('status', 4)->sum('cookies');

        return $total_deposits - $total_withdrawals;
    }

    public function getBalanceAttribute()
    {
        return $this->balance();
    }
}
