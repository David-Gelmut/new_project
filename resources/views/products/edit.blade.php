@extends('layouts.base')

@section('title', 'Обновление товара ')

@section('main')
    <form action="{{route('update_product',$product)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{$product->title}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input name="description" type="text" class="form-control" id="description"  value="{{$product->description}}">
        </div>

            @foreach($products_stocks_product as $key=>$product_stocks_product)
                 <div class="mb-3">
                        <label for="stocks_{{$key}}" class="form-label">
                           @foreach($stocks as $stock)
                            {{$product_stocks_product->stock_id==$stock->id?$stock->title:''}}
                            @endforeach
                        </label>
                        <input name="{{$product_stocks_product->stock_id}}" type="number" class="form-control" id="stocks_{{$key}}" value="{{$product_stocks_product->quantity}}">
                </div>
            @endforeach
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection('main')

