<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $appends = ['balance', 'name'];

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
        $total_deposits = $this->deposits()->where('status', 4)->sum('rewards');
        $total_withdrawals = $this->withdrawals()->whereIn('status', [1, 2, 4])->sum('rewards');

        return $total_deposits - $total_withdrawals;
    }

    public function getBalanceAttribute()
    {
        return $this->balance();
    }

    public function getNameAttribute()
    {
        return $this->attributes['name'] ?? 'N/A';
    }
}
