@extends('layouts.admin')

@section('title')
Products
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Foods</h5>
        <a  href="{{ route('admin_products_create_view') }}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
        @if(session('message'))
        <h2 class="mb-4">
          {{ session('message') }}
        </h2>
    @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">image</th>
              <th scope="col">description</th>
              <th scope="col">category</th>
              <th scope="col">price</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product )
            <tr>
               <th scope="row">{{ $product->id }}</th>
               <td>{{ $product->name }}</td>
               <th><img src="{{ asset('images/' . $product->image . '') }}" style="height: 60px; width: 90px;"></th>
               <td>{{ $product->description }}</td>
               <td>{{ $product->category }}</td>
               <td>${{ $product->price }}</td>
               <form action="{{ route('admin_products_delete' , $product->id) }}" method="post">
                @csrf
                 <input type="hidden" name="id" value="{{ $product->id }}">
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
