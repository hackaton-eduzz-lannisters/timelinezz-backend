<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table = "user_follows";
    
    public function following()
    {
        return $this->belongsTo(User::class, "following_id", "id");
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}