@extends('layouts.base')

@section('title', 'Categories')

@section('content')

    <div class="col-md-12">
        <h1>Categories</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->code}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="btn btn-group">
                            <form action="{{route("categories.destroy",$category)}}" method="post">
                                <a href="{{route('categories.show', $category)}}" type="button"
                                   class="btn btn-success">View</a>
                                <a href="{{route('categories.edit', $category)}}" type="button"
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
        <a class="btn btn-success" type="button" href="{{route('categories.create')}}">Create category</a>
    </div>

@endsection
