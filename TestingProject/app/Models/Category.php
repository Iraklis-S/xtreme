<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;

class Category extends Model
{
    use HasFactory;



    public function postsCat(){
        return $this->hasMany(BlogPost::class,'categoryId');
    }
}
