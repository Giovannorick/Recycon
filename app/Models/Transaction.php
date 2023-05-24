<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'address'
    ];

    public function users(){
        return $this->belongsTo(User::class, "UserID", "id");
    }

    public function detail(){
        return $this->hasMany(Detail::class, "TransactionID", "id");
    }

    use HasFactory;


}
