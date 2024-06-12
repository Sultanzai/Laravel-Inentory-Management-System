<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/Dashboardstyle.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
  </head>
  <body>
    <div class="dashboard">
      <div class="div">
        <div class="list">
          <div class="text-wrapper">Products</div>
          <div class="search">
            <img class="img" src="img/search.svg" />
            <input id="searchInput" class="label" placeholder="Search..." type="text" onkeyup="filterOrders()" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-2">No</div>
              <div class="text-wrapper-3">Name</div>
              <div class="text-wrapper-4">Barcode</div>
              <div class="text-wrapper-5" style="margin-left:-150px;">Price</div>
              <div class="text-wrapper-6">All Time Units</div>
              <div class="text-wrapper-6" style="margin-left:-45px;">Available Units</div>
              <div class="text-wrapper-7" style="margin-left:-30px;">Status</div>
              <div class="text-wrapper-8" style="margin-left:-20px;">Date</div>
              <div class="text-wrapper-8" style="margin-left:40px;">Edit</div>
              <div class="text-wrapper-8">Delete</div>
            </div>
            {{-- Dispaying Product Data form database --}}
            @foreach ($product as $pro)
            <div class="task clickable-row" data-href="{{ route('product-view', $pro->ID) }}">
              <div class="text-wrapper-9">{{ $pro->ID }}</div>
              <div class="text-wrapper-10">{{ $pro->P_Name }}</div>
              <div class="text-wrapper-11" style="width: 230px;">{{ $pro->Barcode }}</div>
              <div class="pill">
                <div class="tag"  style="margin-left:-90px;"><div class="label-2">{{ $pro->P_Price }}</div></div>
              </div>
              <div class="text-wrapper-12" style="margin-left:-40px;">{{ $pro->P_Units }}</div>
              <div class="text-wrapper-12" style="margin-left:-40px;">{{ $pro->Available_Units }}</div>
              <div class="text-wrapper-13" style="margin-left:-60px;">{{ $pro->P_Status }}</div>
              <div class="text-wrapper-14" style="margin-left:-20px;">{{ $pro->P_Date }}</div>
              <div class="text-wrapper-14" style="width:20px;">E</div>
              <div class="text-wrapper-14" style="width:20px; margin-left:40px;">X</div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <div class="text-wrapper-17">Dashboard</div>
        </div>
        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2" >Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2"  >Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expances</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
        </div>
      </div>
      <a href="{{url('/productform')}}"><div class="element-button-2" style="margin-left: 10px;"><button class="mybtn">Add New Product</button></div></a>
    </div>
{{-- Script for displaying data in view --}}
    <script>
          document.addEventListener('DOMContentLoaded', function() {
              var rows = document.querySelectorAll('.clickable-row');
              rows.forEach(function(row) {
                  row.addEventListener('click', function() {
                      window.location = row.getAttribute('data-href');
                  });
              });
          });



          function filterOrders() {
              // Declare variables
              var input, filter, list, tasks, task, i, txtValue;
              input = document.getElementById('searchInput');
              filter = input.value.toUpperCase();
              list = document.querySelector('.list-2');
              tasks = list.getElementsByClassName('task');
      
              // Loop through all tasks, and hide those who don't match the search query
              for (i = 0; i < tasks.length; i++) {
                  task = tasks[i];
                  txtValue = task.textContent || task.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      task.style.display = "";
                  } else {
                      task.style.display = "none";
                  }
              }
          }

  </script>
    
  </body>
</html>
