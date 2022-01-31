<div class="col -sm-6 col-md-4">
    <div class="thumnail">
        <img src="{{$product->image}}">
        <div  class="caption">
        <h3>{{$product->name}}</h3>
        <p>{{$product->price}}</p>
        <p>{{$product->category->name}}</p>
        <form action="{{route('basket_add' , $product->id)}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Basket</button>
            <a href="{{route('product', [$product->category->code , $product->code])}}" class="btn btn-default" role="button">Read more</a>
        </form>

    </div>
</div>

</div>
