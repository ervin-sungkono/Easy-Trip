<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'ticket_id';
    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'item_id',
        'quantity',
        'ticket_date',
        'status'
    ];

    protected $dates = [
        'ticket_date'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
}
