<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
        .invoice-header {
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin-bottom: 0;
        }
        .invoice-header p {
            margin: 0;
        }
        .invoice-table {
            margin-bottom: 20px;
        }
        .invoice-footer {
            margin-top: 20px;
        }
        .btn{
          background-color: #000000;
          color: white;
        }
        img{
            width: 200px;
            height: 200px;
            margin-left: 41%;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="image">
        <img src="{{ asset('img/logo.png') }}">
    </div>
    <div class="invoice-header text-center">
        <h1>Billing Invoice</h1>
        <br>
        <p>345 W MAIN LOS ANGELES, CA 14151</p>
        <p>Phone: 915-555-0195</p>
        <p>Fax: 915-555-0195</p>
        <p>Email: ELEGANTEMBARACE@GMAIL.COM</p>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="row" style="font-size: 20px;">
                <div class="col-sm-6">
                    <strong>Name</strong> {{ $order->Customer_Name }}<br><br>
                    <strong>Address</strong> {{ $order->Address  }}
                </div>
                <div class="col-sm-6 text-right">
                    <strong>Invoice No.</strong> {{ $order->Order_ID }}<br><br>
                    <strong>Date </strong> {{ $order->O_Date }}
                </div>
            </div>
        </div>
    </div>
    
        <table class="table table-bordered invoice-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Barcode</th>
                        <th>Unit</th>
                        <th>Prices</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $productNames = explode(',', $order->ProductNames);
                        $productBarcodes = explode(',', $order->ProductBarcodes);
                        $orderUnits = explode(',', $order->OrderUnits);
                        $orderPrices = explode(',', $order->OrderPrices);
                        $totalPrices = explode(',', $order->TotalPrice);
                        $maxRows = max(count($productNames), count($productBarcodes), count($orderUnits), count($orderPrices), count($totalPrices));
                    @endphp
        
                    @for($i = 0; $i < $maxRows; $i++)
                        <tr>
                            <td>{{ $productNames[$i] ?? '' }}</td>
                            <td>{{ $order->O_Description }}</td>
                            <td>{{ $orderUnits[$i] ?? '' }}</td>
                            <td>${{ $orderPrices[$i] ?? '' }}</td>
                            <td>${{ $orderUnits[$i]*$orderPrices[$i] ?? '' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
            {{-- <div class="row">
                <div class="col">
                    <strong>Description </strong> {{ $order->O_Description }}
                </div>
            </div> --}}

    
    <div class="invoice-footer" style="font-weight: 400; font-size:20px;">
        <p><strong>Total Amount:</strong> ${{ $order->TotalPrice }}</p>
        <p>Thank you for your choosing US!</p>
    </div>
    
    <div class="mt-4 no-print">
        <a href="{{ url('/order') }}" class="btn">Back to Orders</a>
        <button onclick="window.print()" class="btn">Print Order</button>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
