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
          <div class="text-wrapper">Dashboard</div>
          <div class="search">
            <img class="img" src="img/search.svg" /> <input class="label" placeholder="Search..." type="text" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-2">No</div>
              <div class="text-wrapper-3">Name</div>
              <div class="text-wrapper-4">Order Name</div>
              <div class="text-wrapper-5">Total Amount</div>
              <div class="text-wrapper-6">Payment Status</div>
              <div class="text-wrapper-7">Status</div>
              <div class="text-wrapper-8">Date</div>
            </div>
            <div class="task">
              <div class="text-wrapper-9">1</div>
              <div class="text-wrapper-10">Alex</div>
              <div class="text-wrapper-11">Max Collection</div>
              <div class="pill">
                <div class="tag"><div class="label-2">$4800</div></div>
              </div>
              <div class="text-wrapper-12">Paid</div>
              <div class="text-wrapper-13">Shipped</div>
              <div class="text-wrapper-14">5/20/2024</div>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="card">
            <div class="text-wrapper-15">Daily Orders</div>
            <div class="text-wrapper-16">15</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Weekly Orders</div>
            <div class="text-wrapper-16">90</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Monthly Orders</div>
            <div class="text-wrapper-16">280</div>
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
    </div>
  </body>
</html>
