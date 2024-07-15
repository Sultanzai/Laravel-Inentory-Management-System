<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset('css/globals.css')}}" />
    <link rel="stylesheet" href="{{asset('css/styleguide.css')}}" />
    <link rel="stylesheet" href="{{asset('css/Dashboardstyle.css')}}" />
    <link rel="stylesheet" href="{{asset('css/MainStyle.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .report-nav {
            margin-top: 190px;
            background-color: #333;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            width: 60%;
            align-content: center;
            margin-left: auto;
            margin-right: auto;
        }
        .report-nav .nav-link {
            color: #fff;
            margin: 5px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .report-nav .nav-link:hover,
        .report-nav .nav-link.active {
            background-color: #fff;
            color: #333;
        }
        .report-section {
            display: none;
        }
        .report-section.active {
            display: block;
        }
        .cards {
            margin-top: 110px;
        }
        .card {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .graph{
          margin-top: 250px;
          width:100%;
          height: 600px;
          background-color: rgb(255, 255, 255);
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="div">
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
                <a href="{{url('/customer')}}"><button class="btn2">Customers</button></a>
                <a href="{{url('/order')}}"><button class="btn2">Orders</button></a>
                <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
                <a href="{{url('/expances')}}"><button class="btn2" >Expenses</button></a>
                <a href="{{url('/product')}}"><button class="btn2" >Products</button></a>
                <a href="{{url('/Company-page')}}"><button class="btn2" >Company</button></a>
            </div>
            <div class="element-button-2" style="margin-top: -200px; margin-left:-22px;"><button class="mybtn" id="backupButton">Backup</button></div>

            <!-- Report Navigation -->
            <div class="report-nav">
                <a class="nav-link" href="#product-report" onclick="showReport('product-report')">Product</a>
                <a class="nav-link" href="#order-report" onclick="showReport('order-report')">Order</a>
                <a class="nav-link" href="#bill-report" onclick="showReport('bill-report')">Bill</a>
                <a class="nav-link" href="#sales-report" onclick="showReport('sales-report')">Sales</a>
                <a class="nav-link" href="#profit-report" onclick="showReport('profit-report')">Profit</a>
                <a class="nav-link" href="#expenses-report" onclick="showReport('expenses-report')">Expenses</a>
                <a class="nav-link" href="#payments-report" onclick="showReport('payments-report')">Payments</a>
            </div>

            <!-- Product Report -->
            <div id="product-report" class="report-section active">
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
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>

            <!-- Order Report -->
            <div id="order-report" class="report-section">
                <div class="cards">
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
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>

            <!-- Bill Report -->
            <div id="bill-report" class="report-section">
                <div class="cards">
                    <div class="card">
                        <div class="text-wrapper-15">Daily Company bills</div>
                        <div class="text-wrapper-16">${{ $dailybill }}</div>
                    </div>
                    <div class="card-2">
                        <div class="text-wrapper-15">Weekly Company bills</div>
                        <div class="text-wrapper-16">${{ $weeklybill }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Monthly Company bills</div>
                        <div class="text-wrapper-16">${{ $monthlybill }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Total Company bills</div>
                        <div class="text-wrapper-16">${{ $totalbill }}</div>
                    </div>
                </div>
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>

            <!-- Sales Report -->
            <div id="sales-report" class="report-section">
                <div class="cards">
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
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>

            <!-- Profit Report -->
            <div id="profit-report" class="report-section">
                <div class="cards">
                    <div class="card">
                        <div class="text-wrapper-15">Daily Profit</div>
                        <div class="text-wrapper-16">${{ $dailySales - $dailyprofit }}</div>
                    </div>
                    <div class="card-2">
                        <div class="text-wrapper-15">Weekly Profit</div>
                        <div class="text-wrapper-16">${{ $weeklySales - $weeklyprofit }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Monthly Profit</div>
                        <div class="text-wrapper-16">${{ $monthlySales - $monthlyprofit }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Total Profit</div>
                        <div class="text-wrapper-16">${{ $totalSales - $totalprofit }}</div>
                    </div>
                </div>
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>

            <!-- Expenses Report -->
            <div id="expenses-report" class="report-section">
                <div class="cards">
                    <div class="card">
                        <div class="text-wrapper-15">Daily Expenses</div>
                        <div class="text-wrapper-16">${{ $dailyexpances }}</div>
                    </div>
                    <div class="card-2">
                        <div class="text-wrapper-15">Weekly Expenses</div>
                        <div class="text-wrapper-16">${{ $weeklyexpances }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Monthly Expenses</div>
                        <div class="text-wrapper-16">${{ $monthlyexpances }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Total Expenses</div>
                        <div class="text-wrapper-16">${{ $totalexpances }}</div>
                    </div>
                </div>
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>

            <!-- Payments Report -->
            <div id="payments-report" class="report-section">
                <div class="cards">
                    <div class="card">
                        <div class="text-wrapper-15">Payment Completed</div>
                        <div class="text-wrapper-16">${{ $completedPayments }}</div>
                    </div>
                    <div class="card-2">
                        <div class="text-wrapper-15">Pending Payments & Cheque Remaining</div>
                        <div class="text-wrapper-16" style="color: red">${{ $Unpaid + $Underprocess }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Total Revenue</div>
                        <div class="text-wrapper-16">${{ $TotalRevenue }}</div>
                    </div>
                    <div class="card-3">
                        <div class="text-wrapper-15">Net Profit</div>
                        <div class="text-wrapper-16">${{ $Revenue }}</div>
                    </div>
                </div>
                {{-- Graph view --}}
                <div class="graph"></div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function showReport(reportId) {
            document.querySelectorAll('.report-section').forEach(function (section) {
                section.classList.remove('active');
            });
            document.getElementById(reportId).classList.add('active');
            document.querySelectorAll('.report-nav .nav-link').forEach(function (link) {
                link.classList.remove('active');
            });
            document.querySelector(`.report-nav .nav-link[href='#${reportId}']`).classList.add('active');
        }

        $(document).ready(function() {
            $('#backupButton').click(function() {
                $.ajax({
                    url: '{{ route("backup.create") }}',
                    type: 'GET',
                    success: function(response) {
                        alert(response.message);
                        $('#backupPath').text('Backup file created at: ' + response.path);
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });

            // Show the first report section by default
            showReport('product-report');
        });
    </script>
</body>
</html>
