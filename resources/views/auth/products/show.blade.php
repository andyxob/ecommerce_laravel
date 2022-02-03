@extends('layouts.base')

@section('title', 'Product '.$product->name)

@section('content')

    <div class="col-md-12">
        <h1> Product {{$product->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Id</td>
                <td>{{$product->id}}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{$product->code}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$product->name}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$product->description}}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{$product->category_id}}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td>{{$product->image}}</td>
            </tr>
            </tbody>
        </table>
    </div>


@endsection
