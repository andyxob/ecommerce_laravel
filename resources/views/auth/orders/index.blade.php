@extends ('layouts.base')

@section('title', 'Orders')

@section('content')


    @extends('auth.layouts.head')

    <h1> You are logged in</h1>

    <div class="col-md-12">
        <h1>Orders</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>When sent</th>
                <th>Suma</th>
                <th>Actions</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->updated_at->format('h:i d/n/y')}}</td>
                    <td>{{$order->getFullPrice()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
