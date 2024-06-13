


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
          <a href="{{url('/dashboard')}}"><div class="text-wrapper-2">Dashboard</div></a>
        </div>
        <div class="list">
          <div class="text-wrapper-4">Expanses</div>
          <div class="search">
            <img class="img" src="img/search.svg" />
            <input id="searchInput" class="label" placeholder="Search..." type="text" onkeyup="filterOrders()" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">No</div>
              <div class="text-wrapper-6">NAME</div>
              <div class="text-wrapper-7" style="width: 490px;">DESCRIPTION </div>
              <div class="text-wrapper-8">Amount</div>
              <div class="text-wrapper-9">Date</div>
              <div class="text-wrapper-10">Edit</div>
              <div class="text-wrapper-11" style="margin-left: -60px;">Delete</div>
            </div>

            @foreach ($expances as $exp)
              <div class="task">
                <div class="text-wrapper-12">{{ $exp->id }}</div>
                <div class="text-wrapper-13">{{ $exp->E_Name }}</div>
                <div class="text-wrapper-14" style="width: 490px;">{{ $exp->E_Descriptio }}</div>
                <div class="pill">
                  <div class="tag"><div class="label-2">${{ $exp->E_Amount }}</div></div>
                </div>
                <div class="tag-wrapper">
                  <div class="label-wrapper"><div class="label-2" style="margin-left: -90px;">{{ $exp->E_Date }}</div></div>
                </div>
                <div class="text-wrapper-15" style="margin-left:-30px;" onclick="viewPayment({{ $exp->id  }})"><i class="fa fa-edit" style="font-size:20px"></i></div>
                
                <form id="delete-form-{{ $exp->id }}" action="{{ route('expances.destroy', $exp->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <div class="text-wrapper-15" style="width:20px; margin-left:-50px;" onclick="confirmDelete({{ $exp->id }})"><i class="fa fa-trash-o" style="font-size:20px"></i></div>
                </form>

              </div>
            @endforeach

          </div>
        </div>
        <a href="{{url('/expancesform')}}"><div class="element-button-2"><button class="mybtn">Add New Expanses</button></div></a>
      </div>
    </div>









    <script>
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
                function viewPayment(customerid) {
                window.location.href = '/expancesupdate/' + customerid;
        }

        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this Expances?')) {
                document.getElementById('delete-form-' + customerId).submit();
            }
          }
  </script>



  </body>
</html>
