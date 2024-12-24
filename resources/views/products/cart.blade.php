@extends('layouts.app')

@section('title')
Your Cart
@endsection

@section('content')


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }}); margin-top: 67px;" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Cart</h1>
              @if(session('message'))
              <h2 class="mb-4">
                {{ session('message') }}
              </h2>
          @endif
              <section class="ftco-section ftco-cart" style="width: fit-content; margin-left: -190px;">
                  <div class="container">
                      <div class="row">
                      <div class="col-md-12 ftco-animate">
                          <div class="cart-list">
                              <table class="table">
                                  <thead class="thead-primary">
                                    <tr class="text-center">
                                      <th>Remove</th>
                                      <th>Image</th>
                                      <th>Product</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Total</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if ($cart->count() <= 0 )
                                    <h2 class="mb-4">
                                        Please Add Some Products To Your Cart
                                      </h2>
                                    @else

                                    @foreach ($cart as $product )

                                    <tr class="text-center">

                                        <td class="product-remove">
                                            <form action="{{ route('remove_from_cart' )}}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                            <button type="submit" name="submit" class="btn" style="background: none;"><span class="icon-close"></span></button>
                                            </form>
                                        </td>

                                      <td class="image-prod"><div class="img" style="background-image:url({{ asset('images/' . $product->image . '') }});"></div></td>

                                      <td class="product-name">
                                          <h3>{{ $product->name }}</h3>
                                      </td>

                                      <td class="price">${{ $product->price }}</td>

                                      <td>
                                          <div class="input-group mb-3">
                                              <input disabled type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                            </div>
                                        </td>

                                        <td class="total">${{ $product->price }}</td>
                                    </tr><!-- END TR-->
                                    @endforeach
                                    @endif
                                  </tbody>
                                </table>
                            </div>
                      </div>
                  </div>
                </div>
            </section>
        </div>


        </div>
      </div>
    </div>
  </section>
        @if ($cart->count() <= 0)

        @else

        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3" style="margin-top: 25px; margin-left: -20px;">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>${{ $cart_total }}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>${{ $cart_total }}</span>
                    </p>
                </div>
                <form action="{{ route('prepare_checkout') }}" method="post">
                    @csrf
                    <input type="hidden" name="price" value="{{ $cart_total }}">
                <button type="submit" name="submit" style="margin-left: -20px;" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                </form>
            </div>
        </div>
        @endif
@endsection
