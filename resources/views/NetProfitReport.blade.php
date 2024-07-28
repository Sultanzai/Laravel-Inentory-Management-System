<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Net Profit Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
    .btn{
        background-color: #1f1f1f;
        border-color: #000000;
    }
    .btn:hover {
        background-color: #000000;
    }
</style>
<body>
    <div class="container mt-5">
        <h1>Profit Report</h1>

        <form method="GET" action="{{ url('/NetProfitReport') }}" class="form-inline mb-3">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search..." value="{{ request('search') }}">
            <input type="date" name="start_date" class="form-control mr-2" value="{{ request('start_date') }}">
            <input type="date" name="end_date" class="form-control mr-2" value="{{ request('end_date') }}">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <a href="{{url('/order')}}"><button class="btn btn-primary">Back</button></a>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order / Invoice ID</th>
                    <th>Total Order Amount</th>
                    <th>Total Product Cost</th>
                    <th>Profit</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($processedData as $data)
                    <tr>
                        <td>{{ $data['Order_ID'] }}</td>
                        <td>{{ number_format($data['Total_Product_Amount'], 2) }}</td>
                        <td>{{ number_format($data['Product_Cost'], 2) }}</td>
                        <td>{{ number_format( $data['Total_Product_Amount'] - $data['Product_Cost']) }}</td>
                        <td>{{ $data['Details'][0]->OrderDetail_CreatedAt }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>{{ number_format($totalProductAmount, 2) }}</strong></td>
                    <td><strong>{{ number_format($productCost, 2) }}</strong></td>
                    <td><strong>{{ number_format($totalProductAmount - $productCost) }}</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <button onclick="window.print()" class="btn btn-primary">Print</button> <br><br><br>

    </div>
</body>
</html>
