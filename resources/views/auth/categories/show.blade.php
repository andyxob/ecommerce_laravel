@extends('layouts.base')

@section('title', 'Category '. $category->name)

@extends('auth.layouts.head')

@section('content')
    <div class="col-md-12">
        <h1> Category {{$category->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Id</td>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{$category->code}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$category->name}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$category->description}}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" width="300" height="300"></td>
            </tr>

            <tr>
                <td>Products count</td>
                <td>{{$category->products->count()}}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
