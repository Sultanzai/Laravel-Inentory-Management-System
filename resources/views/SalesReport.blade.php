<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
<div class="row" style="font-size: 20px;">  
    <h3>Sales Report</h3>
</div>
    <div>
        <div class="card-body">
            <div class="row" >
              
            </div>
        </div>
    </div>
    
        <table class="table table-bordered invoice-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Barcode</th>
                        <th>Price</th>
                        <th>Available Units</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>                        
                    
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        
                </tbody>
            </table>

    <div class="mt-4 no-print" style="padding-Bottom:100px; ">
        <a href="{{ url('/product') }}" class="btn">Back </a>
        <button onclick="window.print()" class="btn">Print</button>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
