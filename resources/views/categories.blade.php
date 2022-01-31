@extends('layouts.base')

@section('title') Categories @endsection

@section('content')
    <h2>Categories</h2>
    @foreach($categories as $category)
        <div>
            <a style="text-decoration: none" href="{{route('category', $category->code)}}"><h3>Category  {{ $category->name }}</h3></a>
                <p>{{$category->description}}</p>
        </div>
    @endforeach
@endsection
