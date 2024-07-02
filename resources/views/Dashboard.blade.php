<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/Dashboardstyle.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  
  </head>
  <body>
    <div class="dashboard">
      <div class="div">

        {{-- Product Report --}}
        <div class="cards">
          <div class="card">
            <div class="text-wrapper-15">Total Products</div>
            <div class="text-wrapper-16">{{ $totalproducts }}</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Available Products</div>
            <div class="text-wrapper-16">{{ $totalavailableproducts }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Total Product Amount</div>
            <div class="text-wrapper-16">${{ $totalValue }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Available Product Amount</div>
            <div class="text-wrapper-16">$ {{$totalAvailiableValue}}</div>
          </div>
        </div>

        {{-- Order Report --}}
        <div class="cards" style="margin-top:200px;">
          <div class="card">
            <div class="text-wrapper-15">Daily Orders</div>
            <div class="text-wrapper-16">{{ $dailyOrders }}</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Weekly Orders</div>
            <div class="text-wrapper-16">{{ $weeklyOrders }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Monthly Orders</div>
            <div class="text-wrapper-16">{{ $monthlyOrders }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Total Orders</div>
            <div class="text-wrapper-16">{{ $totalOrders }}</div>
          </div>
        </div>

        {{-- Sales Report --}}
        <div class="cards" style="margin-top:400px;">
          <div class="card">
            <div class="text-wrapper-15">Daily Sales</div>
            <div class="text-wrapper-16">${{ $dailySales }}</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Weekly Sales</div>
            <div class="text-wrapper-16">${{ $weeklySales }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Monthly Sales</div>
            <div class="text-wrapper-16">${{ $monthlySales }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Total Sales</div>
            <div class="text-wrapper-16">${{ $totalSales }}</div>
          </div>
        </div>

        {{-- Expances Report --}}
        <div class="cards" style="margin-top:400px;">
          <div class="card">
            <div class="text-wrapper-15">Daily Expense</div>
            <div class="text-wrapper-16">${{ $dailyexpances }}</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Weekly Expense</div>
            <div class="text-wrapper-16">${{ $weeklyexpances }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Monthly Expense</div>
            <div class="text-wrapper-16">${{ $monthlyexpances }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Total Expense</div>
            <div class="text-wrapper-16">${{ $totalexpances }}</div>
          </div>
        </div>

        {{-- Payment Report --}}
        <div class="cards" style="margin-top:600px;">
          <div class="card">
            <div class="text-wrapper-15">Payment Completed</div>
            <div class="text-wrapper-16">${{ $completedPayments }}</div>
          </div>
          <div class="card-2">
            <div class="text-wrapper-15">Check Remaining</div>
            <div class="text-wrapper-16"  style="color: red">${{ $Underprocess }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Pending Payments</div>
            <div class="text-wrapper-16" style="color: red">${{ $Unpaid }}</div>
          </div>
          <div class="card-3">
            <div class="text-wrapper-15">Total Revenue</div>
            <div class="text-wrapper-16">${{ $Revenue }}</div>
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
          {{-- Register User --}}
          <div class="buttons" style="margin-left: -10px; font-size:18px; margin-top:5px; font-family:inter; font-weight:500;">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </div>

          <div class="text-wrapper-17">Dashboard</div>
        </div>
        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2" >Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2"  >Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expenses</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
        </div>
      </div>
    </div>
  </body>
</html>
