@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_2.jpg') }}); margin-top: 67px;">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Register</h1>
              <p class="breadcrumbs"></p>
              <div class="container">
                <div class="row">
                  <div class="col-md-12 ftco-animate">
                    <form method="POST" action="{{ route('register') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                          <div class="row align-items-end">
                         <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                                    <input placeholder="Username" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                         </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input placeholder="Confirm Your Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                    <div class="radio">
                                        <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Register</button>
                                    </div>
                            </div>
                        </div>


                      </form><!-- END -->
                  </div> <!-- .col-md-8 -->
                  </div>
                </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
