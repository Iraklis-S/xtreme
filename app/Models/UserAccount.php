<?php

namespace App\Models;

use App\Models\User;
use App\Models\AccountType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAccount extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }

    public function depositWithdraws()
    {
        return $this->hasMany(DepositWithdraw::class, 'user_account_id');
    }
   
    public function trading()
    {
        return $this->hasMany(Trading::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function verificationDocusment()
    {
        return $this->hasOne(VerificationDocument::class);
    }
    protected $fillable =[
        'balance',
        'currency',
        'user_id',
        'account_type_id'
    ];
}
