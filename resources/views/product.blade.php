@extends('layouts.base')

@section('title')

@endsection

@section('content')


<h1>$product->name</h1>
<h2>$product->category->name</h2>


<h1><img src="" width="300" height="300"></h1>

<p>$product->description</p>

@endsection
