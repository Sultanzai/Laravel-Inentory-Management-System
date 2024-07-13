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
          <div class="text-wrapper">Payments</div>
          <div class="search">
            <img class="img" src="img/search.svg" /> 
            <input id="searchInput" class="label" placeholder="Search..." type="text" onkeyup="filterOrders()" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-2">No</div>
              <div class="text-wrapper-3">Customer</div>
              <div class="text-wrapper-5">Type</div>
              <div class="text-wrapper-6">Status</div>
              <div class="text-wrapper-7" style="margin-left:-50px;">Order Amount</div>
              <div class="text-wrapper-7">Paid Amount</div>
              <div class="text-wrapper-8" style="width:150px;">Remining Amount</div>
              <div class="text-wrapper-8">Date</div>
              <div class="text-wrapper-8" style="margin-left: 75px; margin-right:20px;">Edit</div>
              <div class="text-wrapper-8" style="margin-left: 0px; margin-right:20px;">Delete</div>
            </div>
            @foreach ($sortedData as $data)
              @php
                  $statusColor = '';
                  if ($data['P_Status'] == 'Under Process' || $data['P_Status'] == 'Unpaid') {
                      $statusColor = 'color: red;';
                  } elseif ($data['P_Status'] == 'Completed') {
                      $statusColor = 'color: green;';
                  }
              @endphp
          
              <div class="task">
                  <div class="text-wrapper-9">{{ $data['Order_ID'] }}</div>
                  <div class="text-wrapper-10">{{ $data['Customer_Name'] }}</div>
                  <div class="pill">
                      <div class="label-2" style="margin-top: 7px;">{{ $data['P_Type'] }}</div>
                  </div>
                  <div class="text-wrapper-12" style="{{ $statusColor }}">{{ $data['P_Status'] }}</div>
                  <div class="text-wrapper-13" style="margin-left: -30px;">${{ $data['TotalPrice'] }}</div>
                  <div class="text-wrapper-13">${{ $data['P_Amount'] }}</div>
                  <div class="text-wrapper-13" style="margin-left: 30px;">${{ $data['P_Remining'] }}</div>
                  <div class="text-wrapper-14" style="margin-left: 20px;">{{ $data['P_Date'] }}</div>
                  <div class="text-wrapper-14" onclick="viewPayment({{ $data['PaymentID'] }})"><i class="fa fa-edit" style="font-size:20px"></i></div>
                  <form id="delete-form-{{ $data['PaymentID'] }}" action="{{ route('payment.destroy', $data['PaymentID']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <div class="text-wrapper-15" style="margin-left:0px; margin-top:0px; color:black;" onclick="confirmDelete({{ $data['PaymentID'] }})"><i class="fa fa-trash-o" style="font-size:20px"></i></div>
                  </form>            
                </div>
            @endforeach
        
          </div>
        </div>
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
        <a href="{{url('/PaymentReport')}}"><div class="element-button-2" style="margin-top: -200px; margin-left: -20px;"><button class="mybtn">Report</button></div></a>
        <a href="{{url('/Paymentform')}}"><div class="element-button-2" style="margin-top: 0px; margin-left: -20px;"><button class="mybtn">Add Invoice</button></div></a>
      </div>
    </div>  

    <script>
       function filterOrders() {
        // Array of inputs for products 
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
      // Funtion for redirecting to Update Page
      function viewPayment(paymentId) {
            window.location.href = '/paymentform/' + paymentId;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var errorElements = document.querySelectorAll('.error-message');
            errorElements.forEach(function(element) {
                if (element.dataset.showError === 'true') {
                    alert('Invalid Price Input');
                }
            });
        });

        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this customer with all the record?')) {
                document.getElementById('delete-form-' + customerId).submit();
            }
          }

    </script>
  </body>
</html>
