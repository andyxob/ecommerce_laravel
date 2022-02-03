<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    //
    public function basket(){
        $orderId = session('orderId');
        if(!is_null($orderId))
        {
            $order = Order::findOrFail($orderId);
        }
        return view('basket', ['order'=>$order]);
    }

    public function order(){
        $orderId = session('orderId');
        if(is_null($orderId))
        {
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        return view('order', ['order'=>$order]);
    }

    public function orderConfirm(Request $request){

        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('home');
        }
        $order = Order::find($orderId);

        $success = $order->saveOrder($request->name, $request->phone);
        if($success){
            session()->flash('success', 'Your order is in process');
        }
        else{
            session()->flash('warning', "Something went wrong, please try later");
        }
        return redirect()->route('home');
    }

    public function basketAdd($product_id){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId'=>$order->id]);
        }
        else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($product_id))
        {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }
        else{
            $order->products()->attach($product_id);
        }

        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }

        return redirect()->route('basket');
    }

    public function basketRemove($product_id){
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if(is_null($orderId))
        {
            return redirect()->route('basket');
        }
        $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if($pivotRow->count<2 ) {
                $order->products()->detach($product_id);
            }
            else{
                $pivotRow->count--;
                $pivotRow->update();
            }
            return redirect()->route('basket');
    }
}
