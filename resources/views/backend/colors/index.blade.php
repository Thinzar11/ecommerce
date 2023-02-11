@extends('backend')
@section('content')
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
        Color List
    </div>
    <div class="card-body">
        <form action="{{"/adminpanel/colors/create"}}" method="post">
            @csrf
            <div>
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div>
                <label for="">Code</label>
                <input type="color" name="code" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Color List
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Color Code</th>
                <th scope="col">Published</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                <tr>
                    <th scope="row">{{$color->id}}</th>
                    <td>{{$color->name}}</td>
                    <td>{{$color->code}}</td>
                    <td>{{\Carbon\Carbon::parse($color->id)->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{"/adminpanel/colors/edit/$color->id"}}" class="btn btn-primary">Edit</a>
                        <a href="{{"/adminpanel/colors/delete/$color->id"}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>
@endsection
