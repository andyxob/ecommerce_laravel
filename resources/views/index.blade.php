@extends('base')

@section('title')
    index
@endsection

@section('content')

    <h2>Welcome</h2>

    <h2>All products</h2>
<div class="row">
    @foreach($products as $product)
    @include('card' ,['product'=>$product])
    @endforeach
</div>
@endsection
