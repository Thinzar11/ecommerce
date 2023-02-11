@extends('backend')
@section('content')
<div class="card">
    <div class="card-header">
        Create Products
    </div>
    <div class="card-body">
        <form action="{{"/adminpanel/products/store"}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                        <label for="title" class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Choose Category</option>
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                    <label for="price" class="form-label">Image</label>
                    <input type="file" name="photo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                        <label for="color" class="form-label me-2">Color</label>
                        @foreach ($colors as $color)
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  name="colors[]" value="{{$color->id}}">
                        <label for="" class="form-check-label">{{$color->name}}</label>
                    </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                        <label for="color" class="form-label me-2">Size</label>
                        @foreach ($sizes as $size)
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  name="sizes[]" value="{{$size->id}}">
                        <label for="" class="form-check-label">{{$size->size}}</label>
                    </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" rows="10" placeholder="Describe your products"></textarea>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
</div>
@endsection
