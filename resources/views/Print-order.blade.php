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
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="invoice-header text-center">
        <h1>Billing Invoice</h1>
        <p>ABC</p>
        <p>Address1</p>
        <p>Address2</p>
        <p>Phone:</p>
        <p>Email:</p>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <strong>Customer Name:</strong> {{ $order->Customer_Name }}<br>
                    <strong>Order Date:</strong> {{ $order->O_Date }}
                </div>
                <div class="col-sm-6 text-right">
                    <strong>Order ID:</strong> {{ $order->Order_ID }}<br>
                </div>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered invoice-table">
        <thead>
            <tr>
                <th>Product Names</th>
                <th>Product Barcodes</th>
                <th>Order Units</th>
                <th>Order Prices</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->ProductNames }}</td>
                <td>{{ $order->ProductBarcodes }}</td>
                <td>{{ $order->OrderUnits }}</td>
                <td>${{ $order->OrderPrices }}</td>
                <td>${{ $order->TotalPrice }}</td>
            </tr>
        </tbody>
    </table>
    
    <div class="invoice-footer">
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
