@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
  <div class="col">
    <div >
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Orders</h5>
        @if(session('message'))
        <h2 class="mb-4">
          {{ session('message') }}
        </h2>
    @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">first name</th>
              <th scope="col">last name</th>
              <th scope="col">country</th>
              <th scope="col">address</th>
              <th scope="col">city</th>
              <th scope="col">postcode</th>
              <th scope="col">phone</th>
              <th scope="col">email</th>
              <th scope="col">user id</th>
              <th scope="col">price</th>
              <th scope="col">status</th>
              <th scope="col">update status</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order )
            <tr>
              <th scope="row">{{ $order->id }}</th>
              <td> {{ $order->first_name }} </td>
              <td> {{ $order->last_name }} </td>
              <td>{{ $order->country }}</td>
              <td>{{ $order->address }}</td>
              <td>
                {{ $order->city }}
              </td>
              <td>{{ $order->postcode }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->user_id }}</td>
              <td>${{ $order->price }}</td>
              <td>{{ $order->status }}</td>
              <td><a href="{{ route('admin_orders_status_view' , $order->id) }}" class="btn btn-warning  text-center ">Update Status</a></td>
              <form action="{{ route('admin_orders_delete' , $order->id) }}" method="post">
                @csrf
                 <input type="hidden" name="id" value="{{ $order->id }}">
               <td><button type="submit" name="submit" class="btn btn-danger  text-center ">delete</button></td>
            </form>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



</div>
@endsection
