<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'quantity'];
    public  function stocks()
    {
        return $this->belongsToMany(Stock::class,'product_stocks','product_id','stock_id');
    }
}
