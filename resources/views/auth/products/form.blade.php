@extends('layouts.base')

@isset($product)
    @section('title', 'Edit product'.$product->name)
@else
    @section('title', 'Create product')
@endisset

@extends('auth.layouts.head')

@section('content')
    @isset($product)
        <h1>Edit product {{$product->name}}</h1>
    @else
        <h1>Create product</h1>
    @endisset

    <form method="post" enctype="multipart/form-data"
          @isset($product)
          action="{{route('products.update',$product)}}">
        @else
            action="{{route('products.store')}}">
        @endisset

        <div>
            @isset($product)
                @method('PUT')
            @endisset
            @csrf
            <input type="text" class="form-control mt-2" placeholder="Enter product code" name="code" id="code"
                   value="@isset($product) {{$product->code}} "@endisset">
            <input type="text" class="form-control mt-2" placeholder="Enter product name" name="name" id="name"
                   value="@isset($product){{$product->name}} "@endisset">
            <select name="category_id" id="category_id" class="form-control mt-2">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @isset($product)
                            @if($product->category_id == $category->id)
                            selected
                        @endif
                        @endisset>{{$category->name}}</option>
                @endforeach
            </select>
                <input type="number" id="price" name="price" class="form-control mt-2" @isset($product) value="{{$product->price}}"@endisset>
            <textarea name="description" class="form-control mt-2" rows="10" placeholder="Enter description"
                      id="description" cols="70">@isset($product){{$product->description}} @endisset</textarea>
                <input type="file" id="image" name="image" class="form-control">
            <button type="submit" class="btn btn-success mt-2">@isset($product)Edit product @else Create product @endisset</button>
        </div>
    </form>
@endsection
