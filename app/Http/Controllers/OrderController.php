<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('user')->orderBy('created_at','desc')->get();
        return view('backend.orders.index',[
            'orders' => $order,
        ]);
    }

    public function detail($id)
    {
        $status = ['Pending','Confirmed','Processing','Cancelled','Shipped'];
        $order = Order::find($id);
        return view('backend.orders.detail',[
            'status' => $status,
            'orders' => $order,
        ]);
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->status = request()->status;
        $order->save();
        return redirect("adminpanel/orders");
    }
}
