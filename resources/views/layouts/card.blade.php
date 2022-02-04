<div class="col -sm-6 col-md-4">
    <div class="thumnail">
        <img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" width="150" height="150">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}</p>
            <p>{{$product->category->name}}</p>
            <div style="display: inline">
                <form action="{{route('basket_add' , $product->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">To basket</button>
                </form>
                <a href="{{route('product', [$product->category, $product])}}" class="btn btn-default" role="button">Read more</a>

            </div>
        </div>
    </div>

</div>
