<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/Dashboardstyle.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


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

            @php
              $statusColor = '';
              if ($pro->P_Status == 'Out Of stock' || $pro->P_Status == 'Unpaid') {
                  $statusColor = 'color: red;';
              } elseif ($pro->P_Status == 'In Stock') {
                  $statusColor = 'color: green;';
              }
                elseif ($pro->P_Status == 'Shipped') {
                  $statusColor = 'color: Yellow;';
              }
            @endphp

            <div class="task"  data-href="{{ route('product-view', $pro->ID) }}">
              <div class="text-wrapper-9">{{ $pro->ID }}</div>
              <div class="text-wrapper-10">{{ $pro->P_Name }}</div>
              <div class="text-wrapper-11" style="width: 230px;">{{ $pro->Barcode }}</div>
              <div class="pill">
                <div class="tag"  style="margin-left:-90px;"><div class="label-2">{{ $pro->P_Price }}</div></div>
              </div>
              <div class="text-wrapper-12" style="margin-left:-40px;">{{ $pro->P_Units }}</div>
              @php
              if($pro->Available_Units!=0){
                echo
                "
                <div class='text-wrapper-12' style='margin-left:-40px;'> $pro->Available_Units </div>
                <div class='text-wrapper-13' style='margin-left:-60px;  $statusColor '> $pro->P_Status </div>
                ";
              }
              else {
                echo
                "
                <div class='text-wrapper-12' style='margin-left:-40px;'> $pro->Available_Units </div>
                <div class='text-wrapper-13' style='margin-left:-60px; color:red;'>Out Of stock </div>";
              }

                @endphp

              <div class="text-wrapper-14" style="margin-left:-20px;">{{ $pro->P_Date }}</div>
              <div class="text-wrapper-14" style="width:20px;" onclick="viewPayment({{ $pro->ID  }})"><i class="fa fa-edit" style="font-size:20px"></i></div>
              <form id="delete-form-{{ $pro->ID }}" action="{{ route('Product.destroy', $pro->ID) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <div class="text-wrapper-14" style="width:20px; margin-left:40px;" onclick="confirmDelete({{ $pro->ID }})"><i class="fa fa-trash-o" style="font-size:20px"></i></div>
              </form>
            </div>
            @endforeach
          </div>
        </div>
        <div class="navigation">
        <div class="navigation">
          <div class="avatar">
            <a style="font-size:18px; margin-top:5px; font-family:inter; font-weight:500;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
          </div>
          <a href="{{url('/dashboard')}}"><div class="text-wrapper-17">Dashboard </div></a>
        </div>
        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2">Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2">Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expenses</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
          <a href="{{url('/Company-page')}}"><button class="btn2" >Company</button></a>
        </div>
      </div>
      <a href="{{url('/productform')}}"><div class="element-button-2" style="margin-top: -60px; margin-left:-35px;"><button class="mybtn">Add New Product</button></div></a>
      <a href="{{url('/addstock')}}"><div class="element-button-2" style="margin-left:-35px;"><button class="mybtn">Insert Stock</button></div></a>
      <a href="{{url('/print-products')}}"><div class="element-button-2" style="margin-left:-35px; margin-top: -200px;"><button class="mybtn">Report</button></div></a>
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

          // Route for updating on click event
          function viewPayment(productid) {
            window.location.href = '/productupdate/' + productid;
        }

        // Deleting product
        function confirmDelete(productid) {
            if (confirm('Are you sure you want to delete this Product with all the record?')) {
                document.getElementById('delete-form-' + productid).submit();
            }
          }
  </script>
    
  </body>
</html>
