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
       </div>
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <a href="/Dashboard/Dashboard.html"><div class="text-wrapper-2">Dashboard</div></a>
        </div>
        <div class="list">
          <div class="text-wrapper-4">Orders</div>
          <div class="search">
            <img class="img" src="img/search.svg" /> <input class="label" placeholder="Search..." type="text"/>
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">No</div>
              <div class="text-wrapper-6">NAME</div>
              <div class="text-wrapper-7">ORDER</div>
              <div class="text-wrapper-8">DESCRIPTION</div>
              <div class="text-wrapper-9">UNITS</div>
              <div class="text-wrapper-10">Total</div>
              <div class="text-wrapper-11">DATE</div>
            </div>
            @foreach ($order as $ord)
            <div class="task">
              <div class="text-wrapper-12">{{ $ord->id }}</div>
              <div class="text-wrapper-13">Johhan Marcos</div>
              <div class="text-wrapper-14">Halo Pro 5v+</div>
              <p class="p">{{ $ord->O_Description}}</p>
              <div class="text-wrapper-15">10</div>
              <div class="pill">
                <div class="tag"><div class="label-2">{{ $ord->O_Total}}</div></div>
              </div>
              <div class="tag-wrapper">
                <div class="label-wrapper"><div class="label-2">{{ $ord->O_Date}}</div></div>
              </div>
            </div>     
            @endforeach

    
          </div>
        </div>
        <a href="Add_order.html"><div class="element-button-2"><button class="mybtn">Add New Order</button></div></a>
      </div>
    </div>
  </body>
</html>
