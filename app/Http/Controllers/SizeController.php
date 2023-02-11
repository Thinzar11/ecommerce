<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::all();
        return view('backend.sizes.index',[
            'sizes' => $size,
        ]);
    }

    public function create()
    {
        $validator = validator(request()->all(),[
            'size'=>'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $size = new Size;
        $size->size = request()->size;
        $size->save();
        return back()->with('success','Create Size Successfully');
    }

    public function delete($id)
    {
        $size = Size::find($id);
        $size->delete();
        return back()->with('success','Size delete successfully');
    }
}
