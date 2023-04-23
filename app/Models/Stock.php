<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    public  function products()
{
    return $this->belongsToMany(Product::class,'product_stocks','stock_id','product_id');
}

    public  function quantity($id)
    {
        return $this->belongsToMany(Product::class, 'product_stocks', 'stock_id','product_id')->withPivot('quantity')
            ->where('product_id', '=', $id)->get();;;
    }
}
