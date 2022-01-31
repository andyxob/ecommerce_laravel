<div class="col -sm-6 col-md-4">
    <div class="thumnail">
        <img src="{{$product->image}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}</p>
            <p>{{$product->category->name}}</p>
            <div style="display: inline">
                <form action="{{route('basket_add' , $product->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Basket</button>
                </form>

                <form action="{{route('product' , [$product->category->code, $product->code])}}" method="get">
                    @csrf
                    <button class="btn btn-default" role="button">Read more</button>
                </form>
            </div>
        </div>
    </div>

</div>
