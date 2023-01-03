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

}
