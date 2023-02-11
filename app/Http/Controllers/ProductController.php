<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        return view('backend.products.index',[
            'products' => $product,
            'categories' => $category,
            'colors' => $color,
            'sizes' => $size,
        ]);
    }

    public function create()
    {
        $category = Category::all();
        $color = Color::all();
        $size = Size::all();
        return view('backend.products.create',[
            'categories' => $category,
            'colors' => $color,
            'sizes' => $size,
        ]);

    }

    public function store()
    {
        $validator = validator(request()->all(),[
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        $product = new Product;
        $product->title = request()->title;
        $product->price = request()->price;
        $product->category_id = request()->category_id;
        if(request()->hasfile('photo'))
        {
            $file = request()->file("photo");
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
            $product->image = $filename;
        }
        $product->description = request()->description;
        $product->save();
        $product->colors()->attach(request()->colors);
        $product->sizes()->attach(request()->sizes);
        return redirect('/adminpanel/products');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success','Product Delete Successfully');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $product = Product::find($id);
        return view('backend.products.edit',[
            'products' => $product,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
    public function update($id)
    {
        $validator = validator(request()->all(),[
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        $product = Product::find($id);
        $product->title = request()->title;
        $product->price = request()->price;
        $product->category_id = request()->category_id;
        if(request()->hasfile('photo'))
        {
            $file = request()->file("photo");
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
            $product->image = $filename;
        }
        $product->description = request()->description;
        $product->save();
        $product->colors()->sync(request()->colors);
        $product->sizes()->sync(request()->sizes);
        return redirect('/adminpanel/products')->with('success','Product Updated');
    }
}
