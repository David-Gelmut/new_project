@extends('layouts.base')

@section('title', $stock->title)
@section('main')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Склад</th>
            <th></th><th></th><th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><h2>{{$stock->title}}</h2></td>
            <td>
                @foreach($stock->products as $product)
                   <div>
                       <a href="{{ route('detail_product', ['product' => $product->id]) }}">{{$product->title}}</a>
                       @foreach($product->quantity($stock->id) as $quant)
                          - {{$quant->pivot->quantity}}  шт.
                       @endforeach
                   </div>
                @endforeach

            </td>
            <td>  <a href="{{ route('edit_stock',$stock) }}" class="btn btn-primary">Обновить склад</a></td>
            <td>
                <form action="{{ route('destroy_stock',$stock->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"  class="btn btn-primary">Удалить склад</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    <div><a href="{{ route('index_stocks') }}" class="btn btn-primary">На перечень складов</a></div>
@endsection('main')
