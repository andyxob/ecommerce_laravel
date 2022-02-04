@extends('layouts.base')

@isset($category)
    @section('title' , 'Edit category'.$category->name)
@else
    @section('title' , 'Create category')
@endisset

@extends('auth.layouts.head')

@section('content')
    @isset($category)
        <h1>Edit category {{$category->name}}</h1>
    @else
        <h1>Create category</h1>
    @endisset
    <form method="post" enctype="multipart/form-data"
          @isset($category)
          action="{{route("categories.update", $category)}}">
          @else
          action="{{route("categories.store")}}">
          @endisset

        <div>
            @isset($category)
                @method('PUT')
            @endisset
            @csrf
            <input type="text" class="form-control mt-2" placeholder="Enter category code" name="code" id="code"
                   value="@isset($category) {{$category->code}} "@endisset">
            <input type="text" class="form-control mt-2" placeholder="Enter category name" name="name" id="name"
                   value="@isset($category){{$category->name}} "@endisset">
            <textarea name="description" class="form-control mt-2" rows="10" placeholder="Enter description"
                      id="description" cols="70">@isset($category){{$category->description}} @endisset</textarea>
                <input type="file" name="image" id="image">
            <button type="submit">@isset($category)Edit category @else Create category @endisset</button>
        </div>
    </form>
@endsection

