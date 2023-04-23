<?php

namespace App\Models;


use App\Models\ProductStock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];
    public  function stocks()
    {
        return $this->belongsToMany(Stock::class,'product_stocks','product_id','stock_id');
    }
    public  function quantity($id)
    {
       return $this->belongsToMany(Stock::class, 'product_stocks', 'product_id','stock_id')->withPivot('quantity')
           ->where('stock_id', '=', $id)->get();;
    }



}
