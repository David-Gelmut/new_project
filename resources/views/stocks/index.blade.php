@extends('layouts.base')

@section('title', 'Склады главная')

@section('main')
    @if (count($stocks) > 0)
        <div class="m-2">
            <a href="{{route('create_stocks')}}" class="btn btn-primary">Добавить склад</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Склад</th>
                <th>Наличие товаров</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td><h3>{{$stock->title}}</h3></td>
                    <td>
                        @foreach($stock->products as $product)
                            <div>
                                <a href="{{ route('detail_product', ['product' => $product->id]) }}">{{$product->title}}</a>
                                @foreach($product->quantity($stock->id) as $quant)
                                    - {{$quant->pivot->quantity}} шт.
                                @endforeach
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('detail_stock', ['stock' => $stock->id]) }}" class="btn btn-secondary">Подробнее...</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection('main')

