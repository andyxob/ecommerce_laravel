<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Auth::user()->orders()->where('status',1)->get();
        return view('auth.orders.index', ['orders'=>$orders]);
    }

    public function show(Order $order){
        dd(Auth::user()->orders->contains(order));
        return view('auth.orders.show', ['order'=>$order]);
    }
}
