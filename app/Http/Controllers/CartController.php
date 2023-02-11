<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $color = Color::find(request()->color);
        $size = Size::find(request()->size);
        $item = [
            'product' => $product,
            'color' => $color,
            'quantity' => request()->quantity,
            'size' => $size,
        ];
        // @dd($item['size']['id']);
        if(session()->has('cart'))
        {
            //alerady exisits ~ increment the quantity
            $cart = session()->get('cart');
            $key = $this->checkItemInCart($item);

            if($key != -1)
            {
                $cart[$key]['quantity'] += request()->quantity;
                session()->put('cart', $cart);
            }else{
                session()->push('cart',$item);
            }

        }else{
            session()->push('cart', $item);
        }
        return back()->with('addedToCart', 'Success! Product Has Been Added To Cart');
    }

    public function checkItemInCart($item)
    {
        foreach(session()->get('cart') as $key => $val)
        {

            if($val['product']['id'] == $item['product']['id'] && $val['color']['id'] == $item['color']['id'] && $val['size']['id'] == $item['size']['id'])
            {
                return $key;
            }
        }
        return -1;
    }

    // public function removeFromCart($id)
    // {
    //     if(session()->has('cart')){
    //         $cart = session()->get('cart');
    //         array_splice($cart,$id, 1);
    //         session()->put('cart', $cart);
    //         return back()->with('success','Product remove from Cart');
    //     }
    //     return back();
    // }

    public function removeFromCart($id)
    {
        if (session()->has('cart'))
        {
            $cart = session()->get('cart');
            array_splice($cart,$id,1);
            session()->put('cart',$cart);
            return back()->with('success','Product remove Successfully');
        }
    }
}
