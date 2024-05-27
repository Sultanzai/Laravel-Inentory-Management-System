@extends('customer.layout')
@section('Customers')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $customer->Name }}</h5>
        <p class="card-text">Address : {{ $customer->Address }}</p>
        <p class="card-text">Phone : {{ $customer->Phone }}</p>
  </div>
       
    </hr>
  
  </div>
</div>