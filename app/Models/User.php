<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserFollow;

class User extends Model
{
    protected $guarded = ["id"];
    
    public function follows()
    {
        return $this->hasMany(UserFollow::class);
    }
    
    public function histories()
    {
        return $this->hasMany(History::class, "user_id", "id");
    }
}