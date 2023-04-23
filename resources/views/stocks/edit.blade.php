@extends('layouts.base')

@section('title', 'Обновление склада ')

@section('main')
    <form action="{{route('update_stock',$stock)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{$stock->title}}">
        </div>
        <button type="submit" class="btn btn-primary">Обновить данные</button>
    </form>
@endsection('main')

