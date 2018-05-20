<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "histories";
    protected $guarded = ["id"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function follows()
    {
        return $this->belongsTo(UserFollow::class, "user_id", "user_id");
    }
    
    public function action()
    {
        return $this->belongsTo(Action::class, "action_id", "id");
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    
    public function link()
    {
        return $this->belongsTo(Link::class, "link_id", "id");
    }
}