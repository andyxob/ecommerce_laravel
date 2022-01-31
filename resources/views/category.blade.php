@extends('layouts.base')

@section('title')

    Category {{ $category->name }}

@endsection


@section('content')

    <h1> Category {{$category->name}}   Products count: {{$category->products->count()}}</h1>


    <div class="row">
    @foreach($category->products as $product)
        @include('layouts.card' ,['product'=>$product])
    @endforeach
    </div>

@endsection
