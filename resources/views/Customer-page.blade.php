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
  </head>
  <body>
    <div class="dashboard">
      <div class="div">
        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2" >Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2"  >Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expances</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
        </div>
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <a href="{{url('/dashboard')}}"><div class="text-wrapper-2">Dashboard </div></a>
        </div>
        <div class="list">
          <div class="text-wrapper-4">Customer</div>
          <div class="search">
            <img class="img" src="img/search.svg" />
            <input id="searchInput" class="label" placeholder="Search..." type="text" onkeyup="filterOrders()" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">ID</div>
              <div class="text-wrapper-6">Name</div>
              <div class="text-wrapper-7">Address</div>
              <div class="text-wrapper-8">Contact</div>
              <div class="text-wrapper-9">Balance</div>
              <div class="text-wrapper-9" style="margin-left: 50px;">Edit</div>
              <div class="text-wrapper-9">Delete</div>
            </div>
{{-- Displaying Record from database --}}
            @foreach ($customer as $cus)
              <div class="task">
                <div class="text-wrapper-10">{{ $cus->id }}</div>
                <div class="text-wrapper-11">{{ $cus->Name }}</div>
                <p class="p">{{ $cus->Address }}</p>
                <div class="text-wrapper-12">{{ $cus->Phone }}</div>
                <div class="pill">
                  <div class="tag"><div class="label-2">${{ $cus->Balance }}</div></div>
                  <div class="text-wrapper-14" style="margin-left:150px; margin-top:-20px; color:black;" onclick="viewPayment({{ $cus->id  }})"><i class="fa fa-edit" style="font-size:20px"></i></div>
                  @method('DELETE')
                  <form id="delete-form-{{ $cus->id }}" action="{{ route('customers.destroy', $cus->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <div class="text-wrapper-15" style="margin-left:250px; margin-top:-20px; color:black;" onclick="confirmDelete({{ $cus->id }})"><i class="fa fa-trash-o" style="font-size:20px"></i></div>
                  </form>

                </div>
              </div>
            @endforeach

          </div>
        </div>
        
        <a href="{{url('/customerform')}}"><div class="element-button-2"><button class="mybtn" >Add New Customer</button></div></a>
        





        
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
          function viewPayment(customerid) {
            window.location.href = '/customerupdate/' + customerid;
        }

        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this customer with all the record?')) {
                document.getElementById('delete-form-' + customerId).submit();
            }
          }
      </script>
  </body>
</html>
