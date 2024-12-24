@extends('layouts.admin')

@section('title')
Admins
@endsection

@section('content')

<div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4 d-inline">Admins</h5>
            @if(session('message'))
            <h2 class="mb-4">
              {{ session('message') }}
            </h2>
        @endif
           <a  href="{{ route('admin_admins_create_view') }}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">username</th>
                  <th scope="col">email</th>
                  <th scope="col">delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin )

                <tr>
                    <th scope="row">{{ $admin->id }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <form action="{{ route('admin_admins_delete' , $admin->id) }}" method="post">
                        @csrf
                         <input type="hidden" name="id" value="{{ $admin->id }}">
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
