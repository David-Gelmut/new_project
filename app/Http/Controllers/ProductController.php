<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Stock;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
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
            ]);
      $product= Product::create($data);

      ProductStock::create([
          'product_id'=>$product->id,
          'stock_id'=>$request->stock_id,
          'quantity'=>$request->number
      ]);
      return redirect()->route('index_products');
    }

    public function edit(Product $product) {
        $stocks=Stock::all();
        $products_stocks_product= ProductStock::where('product_id', $product->id)->get();
        return view('products.edit',['product' => $product,'stocks'=>$stocks,'products_stocks_product'=>$products_stocks_product]);
    }

    public function update(Product $product,Request $request) {
       $data=request()->validate([
            'title'=>'string',
            'description'=>'string'
       ]);
     $product->update($data);
     $products_stocks_product= ProductStock::where('product_id', $product->id)->get();
         foreach ($products_stocks_product as $product_stocks_product){
             $value =  $product_stocks_product->stock_id;
             $product_stocks_product->update([
                 'quantity'=>$request[$value]
             ]);
         }
     return redirect()->route('detail_product',['product' => $product]);
    }

    public function destroy(Product $product) {
        $products_stocks_product= ProductStock::where('product_id', $product->id)->get();
        foreach ($products_stocks_product as $product_stocks_product){
            $product_stocks_product->delete();
        }
        $product->delete();
        return redirect()->route('index_products');
    }
}
