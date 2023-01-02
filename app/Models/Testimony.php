<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'text',
        'rating'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
