@extends('layouts.app')

@section('title')
Your Bookings
@endsection

@section('content')


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }}); margin-top: 67px;" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Bookings</h1>

              <section class="ftco-section ftco-cart" style="width: fit-content; margin-left: -190px;">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                  <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    @foreach ($bookings as $booking )
                                    @if ($booking->status == 'Booked')
                                    <th></th>
                                    @endif
                                    @endforeach
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($bookings->count() <= 0)
                                    <h2 class="mb-4">
                                        You Have No Bookings To View
                                      </h2>
                                    @else

                                  @foreach ($bookings as $booking )

                                  <tr class="text-center">

                                    <td class="product-name">
                                        <h3>{{ $booking->first_name }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $booking->last_name }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $booking->date }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $booking->time }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $booking->phone }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $booking->message }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $booking->status }}</h3>
                                    </td>
                                    <td class="product-name">
                                        @if ($booking->status == 'Booked')
                                        <a class="btn btn-primary" href="{{ route('booking_review_view') }}">Review</a>
                                        @endif
                                    </td>
                                  </tr>
                                  @endforeach

                                  @endif

                                </tbody>
                              </table>
                          </div>
                    </div>
                </div>
              </div>
          </section>
        </section>


@endsection
