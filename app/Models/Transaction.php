<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'note',
        'transaction',
        'category',
        'user_id',
        
    ];

    public function users(){
        $this->hasMany(User::class);
    }

}
