@extends('layouts.base')

@section('title', 'Добавление склада')

@section('main')
    <form action="{{route('store_stocks')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection('main')

