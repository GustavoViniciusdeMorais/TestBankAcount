<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['old_value', 'new_value', 'account_id', 'balance_id'];

    public function account()
    {
        
    }
}
