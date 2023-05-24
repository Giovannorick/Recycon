<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function usercart(){
        return $this->belongsTo(UserCart::class, "CartID", "id");
    }

    public function products(){
        return $this->hasOne(Product::class, "ItemID", "ItemID");
    }
}
