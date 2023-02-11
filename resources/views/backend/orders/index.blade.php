@extends('backend')
@section('content')
<div class="card  w-75 mx-auto mt-4">
    @if (session('success'))
    <div class="alert alert-info">{{session('success')}}</div>
    @endif
    <div class="card-header">
        Order List
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Order Id</th>
                <th scope="col">By</th>
                <th scope="col">Items</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->items->count()}}</td>
                    <td>$ {{$order->total}}</td>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                    <td> <span class="badge bg-@if($order->status == 'pending')warning
                        @elseif($order->status == 'Processing')info
                        @elseif($order->status == 'Shipped')success
                        @elseif($order->status == 'Confirmed')primary
                        @elseif($order->status == 'Cancelled')danger @endif">
                        {{$order->status}}
                        </span>
                      </td>
                    <td class="">
                        <a href="{{"/adminpanel/orders/view/$order->id"}}" class=" text-decoration-none text-black btn btn-danger text-white">View</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
  </div>
@endsection
