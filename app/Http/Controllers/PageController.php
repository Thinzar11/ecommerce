<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $product = Product::orderBy("id","DESC")->take(4)->get();
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        return view('frontend.index',[
            'products' => $product,
            'categories' => $category,
            'colors' => $color,
            'sizes' => $size,
        ]);
    }

    public function shop()
    {
        if(request()->colors)
    {
        $id = request()->colors;
        $color = Color::find($id);
        $product = Product::all();
        @dd( $color->products);
        $category = Category::all();
        $size = Size::all();

        return view('frontend.categoryfilter',[
            'products' => $color->products,
            'categories' => $category,
            'colors' => Color::all(),
            'sizes' => $size,
        ]);
    } elseif (request()->sizes) {
        $id = request()->sizes;
        $size = Size::find($id);
        $product = Product::all();
        // @dd($id);
        $category = Category::all();
        $color = Color::all();

        return view('frontend.categoryfilter',[
            'products' => $size->products,
            'categories' => $category,
            'sizes' => Size::all(),
            'colors' => $color,
        ]);
    }else{
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        if(request()->has('q')){

            $search_text = request()->q;
            $product = Product::Where('title','LIKE','%'.$search_text.'%')->paginate(6);
        }else{
            $product = Product::paginate(6);
        }
        return view('frontend.shop',[
            'products' => $product,
            'categories' => $category,
            'colors' => $color,
            'sizes' => $size,
        ]);
    }

    }

    public function latest()
    {
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        if(request()->has('q')){

            $search_text = request()->q;
            $product = Product::Where('title','LIKE','%'.$search_text.'%')->paginate(6);
        }else{
            $product = Product::latest()->paginate(6);
        }
        return view('frontend.shop',[
            'products' => $product,
            'categories' => $category,
            'colors' => $color,
            'sizes' => $size,
        ]);

    }

    public function category($id)
    {

        $category = Category::find($id);
        $color = Color::all();
        $size = Size::all();

        return view('frontend.categoryfilter',[
            'products' => $category->products,
            'categories' => Category::all(),
            'colors' => $color,
            'sizes' => $size,
        ]);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('frontend.detail',[
            'products' => $product,
        ]);
    }

   public function cart()
   {
    return view('frontend.cart');
   }

   public function wishlist()
   {
    $product = Auth::user()->wishlist;
    return view('frontend.wishlist',[
        'products' => $product,
    ]);
   }

   public function checkout()
   {
    return view('frontend.checkout');
   }

   public function contact()
   {
    return view('frontend.contact');
   }
}
