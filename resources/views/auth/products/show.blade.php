@extends('layouts.base')

@section('title', 'Product '.$product->name)

@extends('auth.layouts.head')

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
                <td>{{$product->category->code}}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" width="300" height="300"></td>
            </tr>
            </tbody>
        </table>
    </div>


@endsection
