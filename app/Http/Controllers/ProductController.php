<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Stock;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
      //  dd(Product::with(['stocks'])->get());
        $context = ['products' => Product::all()];
        return view('products.index', $context);
    }
    public function detail(Product $product) {
        return view('products.detail', ['product' => $product]);
    }

    public function create() {
        $stocks=Stock::all();
        return view('products.create',['stocks'=>$stocks]);
    }

    public function store(Request $request) {
        $data=request()->validate([
                'title'=>'string',
                'description'=>'string',
                'stocks'=>'',
                'number'=>''
            ]);
        $stock=$data['stocks'];
        unset($data['stocks']);
          $product= Product::create($data);
          $product->stocks()->attach($stock,['quantity'=>$data['number']]);
        return redirect()->route('index_products');
    }

    public function edit(Product $product) {
        $stocks=Stock::all();
        return view('products.edit',['product' => $product,'stocks'=>$stocks]);
    }

    public function update(Product $product,Request $request) {
       $data=request()->validate([
            'title'=>'string',
            'description'=>'string',
            'stocks'=>'',
            'number'=>''
       ]);
    $stock=$data['stocks'];
    unset($data['stocks']);

    $product->update($data);
    $number=$data['number'];
    $product->stocks()->detach($stock);
    $product->stocks()->attach($stock,['quantity'=>$number]);
     return redirect()->route('detail_product',['product' => $product]);
    }

    public function destroy(Product $product) {
        foreach ($product->stocks as $stock){
            $product->stocks()->detach($stock);
        }
        $product->delete();
        return redirect()->route('index_products');
    }
}
