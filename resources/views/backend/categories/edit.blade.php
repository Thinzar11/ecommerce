@extends('backend')
@section('content')
<div class="card">

@if (session('success'))
<div class="alert alert-info">{{session('success')}}</div>
@endif

@if ($errors->any())

@foreach ($errors->all() as $err )
<div class="alert alert-info">{{$err}}</div>
@endforeach

@endif
    <div class="card-header">
        Edit Category
    </div>
    <div class="card-body">
        <form action="{{"/adminpanel/categories/update/$category->id"}}" method="post">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" value="{{$category->id}}" name="id"> --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$category->name}}">
            </div>
            <button class="btn btn-primary mt-3" type="Submit">Create</button>
        </form>
    </div>
</div>
@endsection
