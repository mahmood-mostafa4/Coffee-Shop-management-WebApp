@extends('layouts.admin')

@section('title')
Create Product
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
     <div class="col">
       <div class="card">
         <div class="card-body">
           <h5 class="card-title mb-5 d-inline">Create Product</h5>
       <form method="POST" action="{{ route('admin_products_create') }}" enctype="multipart/form-data">
        @csrf
             <!-- Email input -->
             <div class="form-outline mb-4 mt-4">
               <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

             </div>
             <div class="form-outline mb-4 mt-4">
               <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />

             </div>
             <div class="form-outline mb-4 mt-4">
               <input type="file" name="image" id="form2Example1" class="form-control"  />

             </div>
             <div class="form-group">
               <label for="exampleFormControlTextarea1">Description</label>
               <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
             </div>

             <div class="form-outline mb-4 mt-4">

               <select name="category" class="form-select  form-control">
                 <option>Choose Type</option>
                 <option value="drink" >drink</option>
                 <option value="dessert" >dessert</option>
               </select>
             </div>

             <br>



             <!-- Submit button -->
             <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


           </form>

         </div>
       </div>
     </div>
   </div>
</div>
@endsection
