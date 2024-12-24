@extends('layouts.app')

@section('title')
Menu
@endsection

@section('content')



<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('images/bg_3.jpg') }}); margin-top: 67px;">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Our Menu</h1>
          </div>

        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section">
      <div class="container">
      <div class="row">


          <div class="col-md-6">
              <h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
              @foreach ($deserts as $desert )

              <div class="pricing-entry d-flex ftco-animate">
                  <div class="img" style="background-image: url({{ asset('images/' . $desert->image . '') }});"></div>
                  <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                          <h3><span>{{ $desert->name }}</span></h3>
                          <span class="price">${{ $desert->price }}</span>
                      </div>
                      <div class="d-block">
                          <p>{{ $desert->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
          </div>

          <div class="col-md-6">
              <h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
              @foreach ($drinks as $drink)
              <div class="pricing-entry d-flex ftco-animate">
                  <div class="img" style="background-image: url({{ asset('images/' . $drink->image . '') }});"></div>
                  <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                          <h3><span>{{ $drink->name }}</span></h3>
                          <span class="price">${{ $drink->price }}</span>
                      </div>
                      <div class="d-block">
                          <p>{{ $drink->description }}</p>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
      </div>
  </section>

  <section class="ftco-menu mb-5 pb-5">
      <div class="container">
          <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Discover</span>
          <h2 class="mb-4">Our Products</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
          <div class="row d-md-flex">
              <div class="col-lg-12 ftco-animate p-md-5">
                  <div class="row">
                <div class="col-md-12 nav-link-wrap mb-5">
                  <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

                    <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
                  </div>
                </div>
                <div class="col-md-12 d-flex align-items-center">

                  <div class="tab-content ftco-animate" id="v-pills-tabContent">



                    <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                      <div class="row">
                        @foreach ($drinks as $drink )

                            <div class="col-md-4 text-center">
                                <div class="menu-wrap">
                                    <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('images/' . $drink->image . '') }});"></a>
                                    <div class="text">
                                        <h3><a href="#">{{ $drink->name }}</a></h3>
                                        <p>{{ $drink->description }}</p>
                                        <p class="price"><span>${{ $drink->price }}</span></p>
                                        <p><a href="{{ route('single_product' , $drink->id) }}" class="btn btn-primary btn-outline-primary">View</a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                      <div class="row">
                        @foreach ($deserts as $desert )

                            <div class="col-md-4 text-center">
                                <div class="menu-wrap">
                                    <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('images/'. $desert->image . '' )}});"></a>
                                    <div class="text">
                                        <h3><a href="#">{{ $desert->name }}</a></h3>
                                        <p>{{ $desert->description }}</p>
                                        <p class="price"><span>${{ $desert->price }}</span></p>
                                        <p><a href="{{ route('single_product' , $desert->id) }}" class="btn btn-primary btn-outline-primary">View</a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>

  @endsection
