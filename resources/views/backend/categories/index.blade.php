@extends('backend')
@section('content')
{{-- @dd($categories); --}}
@if (session('success'))
<div class="alert alert-info">{{session('success')}}</div>
@endif
@if ($errors->any())

@foreach ($errors->all() as $err )
<div class="alert alert-info">{{$err}}</div>
@endforeach

@endif
<div class="card">
    <div class="card-header">
        Category
    </div>
    <div class="card-body">
        <form action="{{"/adminpanel/categories/create"}}" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button class="btn btn-primary mt-3" type="Submit">Create</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Category List
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Published</th>
                <th scope="col">Acticon</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
              <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{($category->name)}}</td>
                <td>{{\Carbon\Carbon::parse($category->created_at)->format('d/m/Y')}}</td>
                <td>
                    <a href="{{"/adminpanel/categories/edit/$category->id"}}" class="btn btn-primary">Edit</a>
                    <a href="{{"/adminpanel/categories/delete/$category->id"}}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
