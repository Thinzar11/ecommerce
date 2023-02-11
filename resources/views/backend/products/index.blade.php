@extends('backend')
@section('content')
@if(session('success'))
<div class="alert alert-info">{{session('success')}}</div>
@endif

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $err )
    <li class="alert alert-info">{{$err}}</li>
    @endforeach
</ul>
@endif
<div class="card">
    <div class="card-header">
        Product List
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Color</th>
                <th scope="col">Size</th>
                <th scope="col">Description</th>
                <th scope="col">Published</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td><img src="{{"/uploads/$product->image"}}" style="height:35px" alt=""></td>

                    <td>@foreach ($product->colors as $color )
                        <span class="badge" style="background-color: {{$color->code}}">{{$color->name}}</span>
                    @endforeach</td>

                    <td>@foreach ($product->sizes as $size )
                        <span>{{$size->size}}</span>
                    @endforeach</td>
                    <td>{{$product->description}}</td>
                    <td>{{\Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{"/adminpanel/products/edit/$product->id"}}" class="btn btn-primary">Edit</a>
                        <a href="{{"/adminpanel/products/delete/$product->id"}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>
@endsection
