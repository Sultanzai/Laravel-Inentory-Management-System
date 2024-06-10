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
          <div class="text-wrapper">Payments</div>
          <div class="search">
            <img class="img" src="img/search.svg" /> <input class="label" placeholder="Search..." type="text" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-2">No</div>
              <div class="text-wrapper-3">Customer</div>
              <div class="text-wrapper-4">Product Name</div>
              <div class="text-wrapper-5">Type</div>
              <div class="text-wrapper-6">Status</div>
              <div class="text-wrapper-7">Price</div>
              <div class="text-wrapper-8">Date</div>
            </div>
            @foreach ($combinedData as $data)

            <div class="task">
              <div class="text-wrapper-9">{{ $data['PaymentID'] }}</div>
              <div class="text-wrapper-10">{{ $data['Customer_Name'] }}</div>
              <div class="text-wrapper-11">{{ $data['ProductNames'] }}</div>
              <div class="pill">
                <div class="label-2">{{ $data['P_Type'] }}</div>
              </div>
              <div class="text-wrapper-12">{{ $data['P_Status'] }}</div>
              <div class="text-wrapper-13">{{ $data['P_Amount'] }}</div>
              <div class="text-wrapper-14">{{ $data['P_Date'] }}</div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="cards">
          <div class="card">
            <div class="text-wrapper-15">Daily </div>
            <div class="text-wrapper-16">$2,500</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Last 7 Days </div>
            <div class="text-wrapper-16">$50,000</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Last 29 Days </div>
            <div class="text-wrapper-16">$800,000</div>
          </div>
        </div>
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <a href="{{url('/dashboard')}}"><div class="text-wrapper-17">Dashboard</div></a>
        </div>

        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2" >Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2"  >Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expances</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
        </div>
        <a href="{{url('/Add-Payment')}}"><div class="element-button-2" style="margin-top: -200px; margin-left: -20px;"><button class="mybtn">Add Invoice</button></div></a>
      </div>
    </div>  
  </body>
</html>
