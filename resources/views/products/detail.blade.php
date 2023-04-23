@extends('layouts.base')

@section('title', $product->title)
@section('main')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Товар</th>
            <th>Описание</th>
            <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><h2>{{$product->title}}</h2></td>
            <td>{{$product->description}}</td>
            <td>  <a href="{{ route('edit_product',$product) }}" class="btn btn-primary">Обновить товар</a></td>
            <td>
                <form action="{{ route('destroy_product',$product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"  class="btn btn-primary">Удалить товар</button>
                </form>
            </td>
            <td></td>
        </tr>

        </tbody>
    </table>
    <a href="{{ route('index_products') }}" class="btn btn-primary">На перечень объявлений</a>
@endsection('main')
