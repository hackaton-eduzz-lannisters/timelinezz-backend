<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ["id"];
    protected $hidden = ["password"];
    
    public function follows()
    {
        return $this->hasMany(UserFollow::class);
    }
    
    public function histories()
    {
        return $this->hasMany(History::class, "user_id", "id");
    }
}