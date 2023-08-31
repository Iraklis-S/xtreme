<?php

namespace App\Models;

use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountType extends Model
{
    use HasFactory;
    public function accounts()
    {
        return $this->hasMany(UserAccount::class, 'account_type_id');
    }
}
