<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_account_id',
        'personal_id_front',
        'personal_id_back',
        'personal_selfie',
        'personal_poa',
    ];

    public function userAccount()
    {
        return $this->belongsTo(UserAccount::class);
    }
}
