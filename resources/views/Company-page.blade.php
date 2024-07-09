<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/customer-style.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  </head>
  <body>
    <div class="dashboard">
      <div class="div">
        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2">Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2">Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expenses</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
          <a href="{{url('/Company-page')}}"><button class="btn2" >Company</button></a>
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
          <a href="{{url('/dashboard')}}"><div class="text-wrapper-2">Dashboard </div></a>
        </div>
        <div class="list">
          <div class="text-wrapper-4">Company</div>
          <div class="search">
            <img class="img" src="img/search.svg" />
            <input id="searchInput" class="label" placeholder="Search..." type="text" onkeyup="filterOrders()" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">ID</div>
              <div class="text-wrapper-6">Name</div>
              <div class="text-wrapper-7">Phone</div>
              <div class="text-wrapper-8" style="margin-left:-80px;">Status</div>
              <div class="text-wrapper-9" style="margin-left:-100px;">Type</div>
              <div class="text-wrapper-9" style="margin-left:50px;">Amount</div>
              <div class="text-wrapper-9" style="margin-left: 80px;">Edit</div>
              <div class="text-wrapper-9">Delete</div>
            </div>
{{-- Displaying Record from database --}}
            @foreach ($company as $comp)
              <div class="task">
                <div class="text-wrapper-10">{{ $comp->id }}</div>
                <div class="text-wrapper-11">{{ $comp->C_Name }}</div>
                <p class="p">{{ $comp->C_Phone }}</p>
                <div class="text-wrapper-12" style="margin-left:-80px;">{{ $comp->C_Status }}</div>
                <div class="text-wrapper-13" style="margin-left:-100px; width: 50px; color:#909090; font-size:14px;">{{ $comp->C_Type }}</div>
                <div class="pill">
                  <div class="tag"  style="margin-left:85px; width:80px; text-align: left;">
                    <div class="label-2">${{ $comp->C_Amount }}</div>
                  </div>
                  <div class="text-wrapper-14" style="margin-left:270px; margin-top:-20px; color:black;" onclick="viewcompany({{ $comp->id  }})"><i class="fa fa-edit" style="font-size:20px"></i></div>
                  @method('DELETE')
                  <form id="delete-form-{{ $comp->id }}" action="{{ route('Company-page.destroy', $comp->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <div class="text-wrapper-15" style="margin-left:370px; margin-top:-20px; color:black;" onclick="confirmDelete({{ $comp->id }})"><i class="fa fa-trash-o" style="font-size:20px"></i></div>
                  </form>

                </div>
              </div>
            @endforeach

          </div>
        </div>
        A
        <a href="{{url('/AddCompany')}}"><div class="element-button-2"><button class="mybtn" >Add Invoice</button></div></a>
        <a href="{{url('/CompanyReport')}}"><div class="element-button-2" style="margin-top:-215px;"><button class="mybtn" >Report</button></div></a>
        





        
        <script>
          // Searching function
          function filterOrders() {
              // Declare variables
              var input, filter, list, tasks, task, i, txtValue;
              input = document.getElementById('searchInput');
              filter = input.value.toUpperCase();
              list = document.querySelector('.list-2');
              tasks = list.getElementsByClassName('task');
      
              // Loop through all 
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
            function viewcompany(Billid) {
            window.location.href = '/updatecompany/' + Billid;
        }

        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this customer with all the record?')) {
                document.getElementById('delete-form-' + customerId).submit();
            }
          }
      </script>
  </body>
</html>
