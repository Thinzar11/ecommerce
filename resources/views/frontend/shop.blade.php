@extends('frontend')
@section('content')
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden">
                    @foreach ($categories as $category )
                    <a href="{{"/category/$category->id"}}" class="nav-item nav-link" style="padding-left:5px; !important">{{$category->name}}</a>
                    @endforeach

                </div>
            </nav>
            <!-- Price End -->

            <!-- Color Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>


                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input type="checkbox" class="custom-control-input" checked id="color-all">
                    <label class="custom-control-label" for="price-all">All Color</label>
                    <span class="badge border font-weight-normal">{{count($colors)}}</span>
                </div>
                @foreach ($colors as $color )
                <form method="" action="">
                  {{-- @dd($_GET["url"]); --}}
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input class="form-check-input" type="radio" name="colors" id="{{$color->id}}" value="{{$color->id}}">
                        <label class="form-check-label" for="{{$color->id}}">
                            {{$color->name}}
                        </label>
                        <span class="badge border font-weight-normal">{{count($color->products)}}</span>
                    </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>
            </div>
            <!-- Color End -->

            <!-- Size Start -->
            <div class="mb-5">
                <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>

                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="size-all">
                        <label class="custom-control-label" for="size-all">All Size</label>
                        <span class="badge border font-weight-normal">{{count($sizes)}}</span>
                    </div>
                    @foreach ($sizes as $size)
                    <form action="" method="">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input class="form-check-input" type="radio" name="sizes" id="{{$size->id}}" value="{{$size->id}}">
                            <label class="form-check-label" for="{{$size->id}}">
                                {{$size->size}}
                            </label>
                            <span class="badge border font-weight-normal">{{count($size->products)}}</span>
                        </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{"/shop"}}">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name" name="q">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        Sort by
                                    </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{"/latest"}}">Latest</a>
                                <a class="dropdown-item" href="{{"/latest"}}">Popularity</a>
                                <a class="dropdown-item" href="{{"/latest"}}">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{"/uploads/$product->image"}}" alt="">
                        @auth
                           @if(auth()->user()->wishlist->contains($product))
                           <form action="{{"/removeFromWishlist/$product->id"}}" method="post">
                            @csrf
                            <button type="submit" class="wishlist form-control w-75 text-primary" >Remove From Wishlist</button>
                        </form>
                           @else
                           <form action="{{"/addtoWishlist/$product->id"}}" method="post">
                            @csrf
                            <button type="submit" class="wishlist form-control w-75 text-primary" >Add to Wishlist</button>
                        </form>
                           @endif
                           @endauth
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$product->title}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>${{$product->price}}</h6>
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


                {{-- <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                      <ul class="pagination justify-content-center mb-3">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                </div> --}}
            </div>
            <div class="row justify-content-end mr-3">
                <p class="mr-3">
                    {{$products->links()}}
                </p>

            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection
