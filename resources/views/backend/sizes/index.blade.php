@extends('backend')
@section('content')
@if(session('success'))
<div class="alert alert-info">{{session('success')}}</div>
@endif
@if($errors->any())
@foreach ($errors->all() as $err )
<div class="alert alert-info">{{$err}}</div>
@endforeach
@endif
<div class="card">
    <div class="card-header">
        Create Size
    </div>
    <div class="card-body">
        <form action="{{"/adminpanel/sizes/create"}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="size" class="form-control">
            </div>
            <button class="btn btn-primary mt-2" type="submit">Create</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        All sizes
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Size</th>
                <th scope="col">Published</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($sizes as $size)
                <tr>
                    <th scope="row">{{$size->id}}</th>
                    <td>{{$size->size}}</td>
                    <td>{{\Carbon\Carbon::parse($size->created_at)->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{"/adminpanel/sizes/edit/$size->id"}}" class="btn btn-primary">Edit</a>
                        <a href="{{"/adminpanel/sizes/delete/$size->id"}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
