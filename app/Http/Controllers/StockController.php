<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index($id){
        $stock=Stock::find($id);
        dd($stock->products);
    }
}
