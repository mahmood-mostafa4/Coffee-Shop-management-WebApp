@extends('layouts.admin')

@section('title')
Order Status Update
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
     <div class="col">
       <div class="card">
         <div class="card-body">
           <h5 class="card-title mb-5 d-inline">Update Order Status</h5>
       <form method="POST" action="" enctype="multipart/form-data">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Current Order Status : {{ $order->status }}</div>

                        <div class="card-body">
                            <form action="{{ route('admin_orders_status_update' , $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="processing" >Processing</option>
                                        <option value="shipped" >Shipped</option>
                                        <option value="delivered" >Delivered</option>
                                        <option value="cancelled" >Cancelled</option>
                                    </select>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Update Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </div>
       </div>
     </div>
   </div>
</div>
@endsection
