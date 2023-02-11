@extends('frontend')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{"/uploads/$product->image"}}" alt="">

                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$product->title}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{$product->price}}</h6>
                    </div>
                    <div class="color d-inline-block">
                        @foreach ($product->colors as $color )
                        <a href="" class="rounded-circle" style="background-color:{{$color->code}}; width:15px; height:15px; display:inherit;">
                        </a>
                        @endforeach
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{"/detail/$product->id"}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>

@endforeach
    </div>
</div>
@endsection

