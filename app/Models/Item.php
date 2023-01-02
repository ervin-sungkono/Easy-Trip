<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'location',
        'status',
        'price'
    ];

    protected $appends = ['avg_rating'];

    protected $dates = [
        'deleted_at'
    ];

    protected $softDelete = true;

    public function testimonies(){
        return $this->hasMany(Testimony::class);
    }

    public function getAvgRatingAttribute(){
        return $this->testimonies()->avg('rating');
    }
}
