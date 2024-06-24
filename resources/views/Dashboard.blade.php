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
          <a href="{{url('/expances')}}"><button class="btn2" >Expances</button></a>
          <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
        </div>
      </div>
    </div>
  </body>
</html>
