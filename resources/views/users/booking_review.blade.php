@extends('layouts.app')

@section('title')
Booking Review
@endsection

@section('content')


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }}); margin-top: 67px;">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread">Review</h1>
                @if(session('message'))
                <h2 class="mb-4">
                  {{ session('message') }}
                </h2>
                @endif
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
                      <form method="POST" action="{{ route('booking_review') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                          <h3 class="mb-4 billing-heading">Write Your Review</h3>
                <div class="row align-items-end">
                    <div class="col-md-6">
                  <div class="form-group">
                      <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="lastname">Last Name</label>
                      <input type="text" class="form-control" name="last_name" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="review">Review</label>
                    <textarea cols="30" rows="10" class="form-control" name="review"  placeholder=""></textarea>
              </div>

              <div class="col-md-12">
                  <div class="form-group mt-4">
                                      <div class="radio">
                    <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Place Your Review</button>

                      </div>
                  </div>
              </div>
              </div>
            </form>
        </section>
@endsection
