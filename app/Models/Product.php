<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'ItemID';
    public $incrementing = false ;

    public function cart() {
        return $this->belongsTo(Cart::class, "ItemID", "ItemID");
    }

    public function details() {
        return $this->belongsTo(Detail::class, "ItemID", "ItemID");
    }

    use HasFactory;
}
