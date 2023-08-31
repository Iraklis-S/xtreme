<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function account()
    {
        return $this->belongsTo(UserAccount::class, 'user_account_id');
    }
}
