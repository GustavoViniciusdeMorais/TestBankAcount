<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'id', 'account_id');
    }
}
