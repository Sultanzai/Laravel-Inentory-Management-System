<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
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
          <div class="text-wrapper-4">Orders</div>
          <div class="search">
              <img class="img" src="img/search.svg" />
              <input id="searchInput" class="label" placeholder="Search..." type="text" onkeyup="filterOrders()" />
          </div>
          <div class="list-2">
              <div class="navbar">
                  <div class="text-wrapper-5">Name</div>
                  <div class="text-wrapper-6">Product Name</div>
                  <div class="text-wrapper-7">Product Barcode</div>
                  <div class="text-wrapper-8">Order Prices</div>
                  <div class="text-wrapper-9">Order Units</div>
                  <div class="text-wrapper-10" style="margin-left:-40px;">Total Order</div>
                  <div class="text-wrapper-11" style="margin-left:-20px;">Date</div>
                  <div class="text-wrapper-12" style="margin-left: -10px;">Edit</div>
                  <div class="text-wrapper-12" style="margin-left: -20px;">Print</div>
                  <div class="text-wrapper-12" style="margin-left: -20px;">Delete</div>
              </div>
              @foreach ($orders as $order)
              <div class="task">
                  <div class="text-wrapper-12">{{ $order->Customer_Name }}</div>
                  <div class="text-wrapper-13">{{ $order->ProductNames }}</div>
                  <div class="text-wrapper-14">{{ $order->ProductBarcodes }}</div>
                  <p class="p">{{ $order->OrderPrices }}</p>
                  <div class="text-wrapper-15">{{ $order->OrderUnits }}</div>
                  <div class="pill" style="margin-left:-50px;">
                      <div class="tag"><div class="label-2">$ {{ $order->TotalPrice }}</div></div>
                  </div>
                  <div class="tag-wrapper">
                      <div class="label-wrapper" style="margin-left:-80px; width:50px;"><div class="label-2">{{ $order->O_Date }}</div></div>
                      <div class="text-wrapper" style="margin-left:80px; margin-top:-25px;" onclick="updateview({{ $order->Order_ID }})"><i class="fa fa-edit" style="font-size:20px"></i></div>
                      <div class="text-wrapper" style="margin-left:145px; margin-top:-25px;" onclick="viewOrder({{ $order->Order_ID }})"><i class="fa fa-print" style="font-size:20px"></i></div>
                      <form id="delete-form-{{ $order->Order_ID }}" action="{{ route('order.destroy', $order->Order_ID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <div class="text-wrapper-15" style="margin-left:200px; margin-top:-20px; color:black;" onclick="confirmDelete({{ $order->Order_ID }})"><i class="fa fa-trash-o" style="font-size:20px"></i></div>
                      </form>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
          </div>
        <a href="{{url('/Add-Order')}}"><div class="element-button-2"><button class="mybtn">Add New Order</button></div></a>
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

      //Redirecting to Print Page 
        function viewOrder(orderId) {
            window.location.href = '/order/' + orderId;
        }

        // Route for updating on click event
        function updateview(orderid) {
            window.location.href = '/orderupdate/' + orderid;
        }
        // Delete funtion for order
        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this Order with all the record?')) {
                document.getElementById('delete-form-' + customerId).submit();
            }
          }

  </script>
  </body>
</html>
