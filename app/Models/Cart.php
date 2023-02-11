<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
   public static function unitPrice($item)
   {
    return $item['product']['price'] * $item['quantity'];
   }

   public static function subtotalAmount()
   {
    $total = 0;
    if(session()->has('cart'))
    {
        foreach(session('cart') as $item)
        {
            $total += self::unitPrice($item);
        }
    }
    return $total;
   }

   public static function totalAmount()
   {
    return self::subtotalAmount() + 30;
   }
}
