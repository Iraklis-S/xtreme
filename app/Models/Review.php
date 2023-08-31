<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;    protected $table = 'reviews';

  

    public function userAccount() {
        return $this->belongsTo(UserAccount::class);
    }
}
