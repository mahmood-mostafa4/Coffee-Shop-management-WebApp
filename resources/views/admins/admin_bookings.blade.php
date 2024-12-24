@extends('layouts.admin')

@section('title')
Bookings
@endsection


@section('content')

<div class="container-fluid">

    <div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Bookings</h5>
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
              <th scope="col">date</th>
              <th scope="col">time</th>
              <th scope="col">phone</th>
              <th scope="col">message</th>
              <th scope="col">status</th>
              <th scope="col">status update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as  $booking)
            <tr>
              <th scope="row">{{ $booking->id }}</th>
              <td>{{ $booking->first_name }}</td>
              <td>{{ $booking->last_name }}</td>
              <td>{{ $booking->date }} </td>
              <td>{{ $booking->time }}</td>
              <td>{{ $booking->phone }}</td>
              <td>{{ $booking->message }}</td>
              <td>{{ $booking->status }}</td>
              <td><a href="{{ route('admin_bookings_status_view' , $booking->id) }}" class="btn btn-warning  text-center ">Update Status</a></td>
              <form action="{{ route('admin_bookings_delete' , $booking->id) }}" method="post">
                @csrf
                 <input type="hidden" name="id" value="{{ $booking->id }}">
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
