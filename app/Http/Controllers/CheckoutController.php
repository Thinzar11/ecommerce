<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

        public function checkout()
        {
            $order = new Order;
            $order->user_id = auth()->id();
            $order->name = request()->name;
            $order->email = request()->email;
            $order->phone = request()->phone;
            $order->address = request()->address;
            $order->city = request()->city;
            $order->state = request()->state;
            $order->zip = request()->zip;
            $order->country = request()->country;
            $order->stripe_id = request()->payment_method_id;
            $order->status = 'pending';
            $order->total = Cart::totalAmount();
            $order->save();


           foreach(session()->get('cart') as $item)
           {
            $order->items()->create([
                'product_id' => $item['product']['id'],
                'size_id' => $item['size']['id'],
                'color_id' => $item['color']['id'],
                'quantity' => $item['quantity'],
            ]);
           }

           session()->forget('cart');
           return view('frontend.orderSuccess',[
            'order' => $order,
           ]);

        }
}
