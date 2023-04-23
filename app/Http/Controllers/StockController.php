<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index() {
        $context = ['stocks' => Stock::all()];
        return view('stocks.index', $context);
    }
    public function detail(Stock $stock) {
        return view('stocks.detail', ['stock' => $stock]);
    }

    public function create(Stock $stock) {
        return view('stocks.create', ['stock' => $stock]);
    }

    public function store() {
        $data=request()->validate([
            'title'=>'string'
        ]);
        Stock::create($data);
        return redirect()->route('index_stocks');
    }

    public function edit(Stock $stock) {

        return view('stocks.edit',['stock' => $stock]);
    }

    public function update(Stock $stock) {
        $data=request()->validate([
            'title'=>'string'
        ]);
        $stock->update($data);
        return redirect()->route('detail_stock',['stock' => $stock]);
    }

    public function destroy(Stock $stock) {
        $products_stocks_stocks= ProductStock::where('stock_id', $stock->id)->get();
        foreach ($products_stocks_stocks as $products_stocks_stock){
            $products_stocks_stock->delete();
        }
        $stock->delete();
        return redirect()->route('index_stocks');
    }
}
