<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
        return view('order');
    }

    public function basketAdd($product_id){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create()->id;
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
