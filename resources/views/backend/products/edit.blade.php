@extends('backend')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Products
    </div>
    <div class="card-body">
        <form action="{{"/adminpanel/products/update/$products->id"}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$products->title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" value="{{$products->price}}">
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
                            <option value="{{$category->id}}" {{$category->id==$products->category_id ?'selected': ''}}>{{$category->name}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                    <label for="price" class="form-label">Image</label>
                    <input type="file" name="photo" class="form-control">
                    <img src="{{"/uploads/$products->image"}}" alt="" style="height:65px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2 form-group">
                        <label for="color" class="form-label me-2">Color</label>
                        @foreach ($colors as $color)
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"  name="colors[]" value="{{$color->id}}" {{in_array($color->id,$products->colors->pluck('id')->toArray()) ? 'checked': ''}}>
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
                        <input class="form-check-input" type="checkbox"  name="sizes[]" value="{{$size->id}}" {{in_array($size->id,$products->sizes->pluck('id')->toArray()) ? 'checked': ''}}>
                        <label for="" class="form-check-label">{{$size->size}}</label>
                    </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea type="text" name="description" class="form-control" rows="10" placeholder="Describe your products">{{$products->description}}</textarea>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
</div>
@endsection
