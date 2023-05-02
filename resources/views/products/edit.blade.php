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

        <div class="mb-3">
            <label for="stocks" class="form-label">Stocks</label>
            <select class="form-select" id="stocks" name="stocks[]">
                @foreach($stocks as $stock)
                    <option value="{{$stock->id}}">{{$stock->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input name="number" type="text" class="form-control" id="number">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection('main')

