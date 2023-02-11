@extends('frontend')
@section('content')
<h1 class="text-center">Order Successfully Placed</h1>
<div class="row">
    <div class="col-8 mx-auto">
        <h3 class="mb-3 ms-4">Your Order Has Successfully Been Placed</h3>
        <h4 class="ms-4">Your Order ID is: {{$order->id}}</h4>
    </div>
</div>
@endsection
