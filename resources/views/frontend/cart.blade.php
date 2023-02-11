@extends('frontend')
@section('content')
 <!-- Cart Start -->
 @if(session()->has('success'))
<div style="position: relative">
    <div style=""class="py-3">
    {{session()->get('success')}}
    <div class="mt-3">
        <a href="{{"/shop"}}" class=" btn btn-outline-primary ">Continue Shopping</a>
        <a href="{{"/cart"}}" class="btn btn-primary text-white">Check out</a>
    </div>
</div>

</div>
@endif
 <div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (session()->has('cart') && session()->get('cart') > 0)
                    @foreach (session()->get('cart') as $key=>$item )


                    <tr>
                        {{-- @dd($item['product']['image']); --}}
                        <td class="align-middle"><img src="/uploads/{{$item['product']['image']}}" alt="" style="width: 50px;"> {{$item['product']['title']}}</td>
                        <td class="align-middle">{{$item['product']['price']}}</td>
                        <td class="align-middle">
                            {{$item['quantity']}}
                        </td>
                        <td class="align-middle">{{App\Models\Cart::unitPrice($item)}}</td>
                        <td class="align-middle">
                        <form action="{{url("/removeFromCart/$key")}}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-times"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <td colspan="6">Your Cart Is Empty</td>
                    @endif


                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">{{App\Models\Cart::subtotalAmount()}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">30</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{App\Models\Cart::totalAmount()}}</h5>
                    </div>
                    <a href="{{"/checkout"}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
