@extends('customer.layout')
@section('Customers')
 
<div class="card">
  <div class="card-header">customer Page</div>
  <div class="card-body">
      
      <form action="{{ url('customers/' .$customer->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$customer->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$customer->Name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$customer->Address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$customer->Phone}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop