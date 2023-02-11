<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('backend.categories.index',[
            'categories' => $category,
        ]);
    }

    public function create()
    {
        $validate = validator(request()->all(),[
            'name' => 'required',
        ]);

        if($validate->fails())
        {
            return back()->withErrors($validate);
        };
        $category = new Category;
        $category->name = request()->name;
        $category->save();
        return back()->with('success','Category Successfully Created');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('success','Category Delete Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit',[
           'category' => $category,
        ]);
    }

    public function update($id)
    {
        $validate = validator(request()->all(),[
            'name' => 'required',
        ]);

        if($validate->fails())
        {
            return back()->withErrors($validate);
        }
        $category = Category::find($id);

        $category->name = request()->name;
        $category->save();
        return redirect("/adminpanel/categories")->with('success','Category Update Successfully');
    }
}
