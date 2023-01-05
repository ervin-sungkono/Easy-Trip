<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'item_id', 'quantity', 'ticket_date'];

    protected $appends = ['total_price'];

    protected $dates = ['ticket_date'];
    
    public function item(){
        return $this->hasOne(Item::class, 'id', 'item_id');
    }

    public function getTotalPriceAttribute(){
        return $this->item->price * $this->quantity;
    }
}
