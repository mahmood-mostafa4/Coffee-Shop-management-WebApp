@extends('layouts.app')

@section('title')
Your Orders
@endsection

@section('content')


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }}); margin-top: 67px;" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Orders</h1>

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
                                    <th>Status</th>
                                    <th>Price</th>
                                    @foreach ($orders as $order )
                                    @if ($order->status == 'Delivered')
                                    <th></th>
                                    @endif
                                    @endforeach
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($orders->count() <= 0)
                                    <h2 class="mb-4">
                                        You Have No Orders To View
                                      </h2>
                                    @else
                                  @foreach ($orders as $order )

                                  <tr class="text-center">

                                    <td class="product-name">
                                        <h3>{{ $order->first_name }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $order->last_name }}</h3>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $order->status }}</h3>
                                    </td>

                                    <td class="price">${{ $order->price }}</td>

                                    <td class="product-name">
                                        @if ($order->status == 'Delivered')
                                        <a class="btn btn-primary" href="{{ route('order_review_view') }}">Review</a>
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
