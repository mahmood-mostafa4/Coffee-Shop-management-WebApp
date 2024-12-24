@extends('layouts.app')

@section('title')
{{ $product->name }}
@endsection

@section('content')

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }}); margin-top: 67px;" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <section class="ftco-section">
                  <div class="container">
                      @if(session('message'))
                      <h2 class="mb-4">
                        {{ session('message') }}
                      </h2>
                  @endif
                      <div class="row">
                          <div class="col-lg-6 mb-5 ftco-animate">
                              <a href="{{ asset('images/'.$product->image.'') }}" class="image-popup"><img src="{{ asset('images/'.$product->image.'') }}" class="img-fluid" alt="Colorlib Template"></a>
                          </div>
                          <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                              <h3>{{ $product->name }}</h3>
                              <p class="price"><span>${{ $product->price }}</span></p>
                              <p>{{ $product->description }}</p>
                                  </p>
                                  <form action="{{ route('add_to_cart' , $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    @if (isset(Auth::user()->id))

                                    @if ($checking_the_cart == 0)

                                    <button type="submit"  name="submit" class="btn btn-primary py-3 px-5"><p style="color: white;">Add to Cart</p></button>
                                    @else

                                    <button disabled style="background-color: black;" class="btn btn-primary py-3 px-5">Already Added to Cart!</button>
                                    @endif

                                    @endif

                                </form>

                          </div>
                      </div>
                  </div>
              </section>

          </div>

        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Discover</span>
          <h2 class="mb-4">Related products</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
        @foreach ($related_products as $related_product)

        <div class="col-md-3">
            <div class="menu-entry">
                <a href="{{ route('single_product' , $product->id) }}" class="img" style="background-image: url({{ asset('images/' . $related_product->image . '') }});"></a>
                <div class="text text-center pt-4">
                    <h3><a href="{{ route('single_product' , $product->id) }}">{{ $related_product->name }}</a></h3>
                    <p>{{ $related_product->description }}</p>
                          <p class="price"><span>${{ $related_product->price }}</span></p>
                          <p><a href="{{ route('single_product' , $product->id) }}" class="btn btn-primary btn-outline-primary">View</a></p>
                      </div>
                    </div>
                </div>
                @endforeach
      </div>
      </div>
  </section>

@endsection
