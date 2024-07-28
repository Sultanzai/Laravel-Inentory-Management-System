<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Order Products</h1>

        <!-- Search and Date Selection Form -->
        <form action="{{ route('NetProfitReport') }}" method="GET">
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="text" name="order_id" id="order_id" class="form-control" value="{{ request('order_id') }}">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Display Results -->
        @if ($orders->isEmpty())
            <p>No orders found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Total Order Price</th>
                        <th>Total Product Cost</th>
                        <th>OrderDetail IDs</th>
                        <th>O Prices</th>
                        <th>O Units</th>
                        <th>OrderDetail Product IDs</th>
                        <th>OrderDetail Created Ats</th>
                        <th>Product IDs</th>
                        <th>P Units</th>
                        <th>P Prices</th>
                        <th>P Dates</th>
                        <th>Product Updated Ats</th>
                        <th>Product Created Ats</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->Order_ID }}</td>
                            <td>{{ $order->total_order_price }}</td>
                            <td>{{ $order->total_product_cost }}</td>
                            <td>{{ $order->OrderDetail_IDs }}</td>
                            <td>{{ $order->O_Prices }}</td>
                            <td>{{ $order->O_units }}</td>
                            <td>{{ $order->OrderDetail_ProductIDs }}</td>
                            <td>{{ $order->OrderDetail_CreatedAts }}</td>
                            <td>{{ $order->Product_IDs }}</td>
                            <td>{{ $order->P_Unitss }}</td>
                            <td>{{ $order->P_Prices }}</td>
                            <td>{{ $order->P_Dates }}</td>
                            <td>{{ $order->Product_UpdatedAts }}</td>
                            <td>{{ $order->Product_CreatedAts }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
