@extends('layouts.base')

@section('title', 'Добавление товара')

@section('main')
    <form action="{{route('store_products')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input name="description" type="text" class="form-control" id="description">
        </div>
        <div class="mb-3">
            <label for="stocks" class="form-label">Stocks</label>
            <select class="form-select" id="stocks" name="stocks">
                @foreach($stocks as $stock)
                <option value="{{$stock->id}}">{{$stock->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input name="number" type="number" class="form-control" id="number">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection('main')

