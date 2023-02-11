<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::all();
        return view('backend.colors.index',[
            'colors' => $color,
        ]);
    }

    public function create()
    {
        $validator = validator(request()->all(),[
            'name' => 'required',
            'code' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
        $color = new Color;
        $color->name = request()->name;
        $color->code = request()->code;
        $color->save();
        return back()->with('success','Create Color Successfully');
    }

    public function delete($id)
    {
        $color = Color::find($id);
        $color->delete();
        return back()->with('success','Delete Color Successfully');
    }

}
