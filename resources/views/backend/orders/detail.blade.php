@extends('backend')
@section('content')
<div class="card  w-75 mx-auto mt-4">
    <div class="card-header">
        Order #{{$orders->id}}
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Order Id</td>
                <td>{{$orders->id}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <form action="{{"/adminpanel/orders/update/$orders->id"}}" method="post" class="d-flex">
                        @csrf
                        <select name="status" class="form-control" id="">
                            @foreach ($status as $status)
                            <option value="{{$status}}" {{$orders->status == $status ? 'selected' : ''}}>{{$status}}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-primary">
                    </form>
                  </td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td>${{($orders->total) / 100}}</td>
            </tr>
            <tr>
                <td>User</td>
                <td>{{$orders->user->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$orders->email}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$orders->phone}}</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>{{$orders->country}}</td>
            </tr>
            <tr>
                <td>State</td>
                <td>{{$orders->state}}</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{$orders->city}}</td>
            </tr>
            <tr>
                <td>Zip Code</td>
                <td>{{$orders->zip}}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{$orders->address}}</td>
            </tr>
            <tr>
                <td>Stripe</td>
                <td>{{$orders->stripe_id}}</td>
            </tr>
        </tbody>
        </table>
    </div>
  </div>
@endsection
