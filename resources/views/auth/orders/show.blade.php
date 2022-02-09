@extends('layouts.base')

@section('title', 'Order # '. $order->id)

@section('content')
    <div class="py-4">
        <div class="justify-content-center">
            <div class="panel">
                <h1>Order # {{$order->id}}</h1>
                <p>Owner: {{$order->name}}</p>
                <p>Phone number: {{$order->phone}}</p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Total price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>
                                <a href="{{route('product', $product)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" width="75" height="75">{{$product->name}}</a>
                            </td>
                            <td><span class="badge">{{$product->count}}</span> </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->getPriceForCount()}}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3">Total price: </td>
                        <td>{{$order->getFullPrice()}}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection
