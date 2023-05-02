@extends('layouts.base')

@section('title', 'Продукты')

@section('main')
    @if (count($products) > 0)
        <div class="m-2">
            <a href="{{route('create_products')}}" class="btn btn-primary">Добавить продукт</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Описание</th>
                <th>Наличие на складах</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><h3>{{$product->title}}</h3></td>
                    <td>{{$product->description}}</td>
                    <td>
                        @foreach($product->stocks as $stock)
                            <div>
                                <a href="{{ route('detail_stock', ['stock' => $stock->id]) }}">{{$stock->title}}</a>
                                {{$stock->pivot->quantity}} шт.
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('detail_product', ['product' => $product->id]) }}" class="btn btn-secondary">Подробнее...</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection('main')

