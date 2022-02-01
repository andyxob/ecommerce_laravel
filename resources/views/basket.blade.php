@extends('layouts.base')

@section('title', 'Basket')


@section('content')

    <h1>Basket</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Count</th>
            <th>Price</th>
            <th>Total</th>
        </tr>

        @foreach($order->products as $product)
            <tr>
                <td>
                    <a href="{{route('product', [$product->category , $product->code])}}">
                        {{$product->name}}
                        {{$product->image}}
                    </a>
                </td>
                <td>{{$product->pivot->count}}
                    <div class="btn-group">
                        <form action="{{route('basket_remove', $product)}} " method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger" aria-hidden="true"><span
                                    class="glyphicon glyphicon-minus">-</span></button>
                        </form>

                        <form action="{{route('basket_add', $product)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success" aria-hidden="true"><span
                                    class="glyphicon glyphicon-plus">+</span></button>
                        </form>
                    </div>
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->getPriceForCount()}}</td>
            </tr>
        @endforeach
    </table>

    <h1>Total price: {{$order->getFullPrice()}}</h1>

    <div class="btn-group pull-right" role="group">
        <a href="{{route('order')}}">Create order</a>
    </div>

@endsection
