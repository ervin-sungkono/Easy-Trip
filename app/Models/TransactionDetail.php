<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'item_id', 'quantity', 'ticket_date'];

    protected $appends = ['total_price'];

    public function item(){
        return $this->hasOne(Item::class, 'id', 'item_id')->withTrashed();
    }

    public function getTotalPriceAttribute(){
        return $this->item->price * $this->quantity;
    }
}
