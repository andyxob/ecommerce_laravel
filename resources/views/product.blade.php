@extends('layouts.base')

@section('title')
    Product
@endsection

@section('content')


<h1>$product->name</h1>
<h2>$product->category->name</h2>


<h1><img src="\Illuminate\Support\Facades\Storage::url($product->image)" width="300" height="300"></h1>

<p>$product->description</p>

@endsection
