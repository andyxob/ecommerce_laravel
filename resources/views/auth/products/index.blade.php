@extends('layouts.base')

@section('title', 'Products')

@section('content')

    <div class="col-md-12">
        <h1>Orders</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <div class="btn btn-group">
                            <form action="{{route("products.destroy",$product)}}" method="post">
                                <a href="{{route('products.show', $product)}}" type="button"
                                   class="btn btn-success">View</a>
                                <a href="{{route('products.edit', $product)}}" type="button"
                                   class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button" href="{{route('products.create')}}">Add product</a>
    </div>
@endsection
