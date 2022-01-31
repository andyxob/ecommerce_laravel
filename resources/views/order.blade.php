@extends('layouts.base')

@section('title', 'Order')

@section('content')

    <h1>Order</h1>

    <h3>Full order price: {{$order->getFullPrice()}}</h3>

    <form class="mt-5" method="post" action="{{route('order_confirm')}}">
        @csrf
        <input type="text" name="name" id="name" class="form-control mt-3" placeholder="Enter name">
        <input type="text" name="phone" id="phone" class="form-control mt-3" placeholder="Enter phone number">
        <button class="mt-3 btn btn-success">Confirm</button>
    </form>

@endsection
