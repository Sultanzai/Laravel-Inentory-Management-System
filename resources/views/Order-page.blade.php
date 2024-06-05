<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
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
            <img class="img" src="img/search.svg" /> <input class="label" placeholder="Search..." type="text"/>
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">Order ID</div>
              <div class="text-wrapper-6">Customer ID</div>
              <div class="text-wrapper-7">Customer Name</div>
              <div class="text-wrapper-8">Order Date</div>
              <div class="text-wrapper-9">Order Detail ID</div>
              <div class="text-wrapper-10">Total Order</div>
              <div class="text-wrapper-11">Units</div>
            </div>
            @foreach ($orders as $order)
            <div class="task">
              <div class="text-wrapper-12">{{ $order->Order_ID }}</div>
              <div class="text-wrapper-13">{{ $order->Customer_ID }}</div>
              <div class="text-wrapper-14">{{ $order->Customer_Name }}</div>
              <p class="p">{{ $order->O_Date }}</p>
              <div class="text-wrapper-15">{{ $order->OrderDetail_ID }}</div>
              <div class="pill">
                <div class="tag"><div class="label-2">$ {{ $order->O_price }}</div></div>
              </div>
              <div class="tag-wrapper">
                <div class="label-wrapper"><div class="label-2">{{ $order->O_unit }}</div></div>
              </div>
            </div>     
            @endforeach

    
          </div>
        </div>
        <a href="{{url('/Add-Order')}}"><div class="element-button-2"><button class="mybtn">Add New Order</button></div></a>
      </div>
    </div>
  </body>
</html>
