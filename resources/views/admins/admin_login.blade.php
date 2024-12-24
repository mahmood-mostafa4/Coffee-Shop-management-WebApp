@extends('layouts.admin')

@section('title')
Admin Login
@endsection

@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mt-5">Login</h5>
          @if (Session('error'))
          <h2 class="mb-4">
            {{ session('error') }}
          </h2>
          @endif
          <form method="POST" class="p-auto" action="{{ route('admin_login_post') }}">
            @csrf

            <!-- Email input -->

              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

              </div>


              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


            </form>

        </div>
   </div>
 </div>
</div>
@endsection
