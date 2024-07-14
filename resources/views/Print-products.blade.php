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
        input {
            padding: 20px;
        }
        .table td {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 50px; /* Adjust the max-width as needed */
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
        .btn {
            background-color: #000000;
            color: white;
        }
        img {
            width: 200px;
            height: 200px;
            margin-left: 41%;
        }
    </style>
    <!-- jQuery and Bootstrap Datepicker CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row" style="font-size: 20px;">  
        <h3>Product Report</h3>
    </div>
    <div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" id="startDate" class="form-control datepicker" placeholder="Start Date">
                </div>
                <div class="col-md-3">
                    <input type="text" id="endDate" class="form-control datepicker" placeholder="End Date">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" onclick="filterReports()">Filter</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <input id="searchInput" class="form-control" placeholder="Search..." type="text" onkeyup="filterOrders()" />
                </div>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered invoice-table">
        <thead>
            <tr class="list-2">
                <th>ID</th>
                <th>Name</th>
                <th>Barcode</th>
                <th>Price</th>
                <th>Available Units</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody id="reportTableBody">
            @foreach($product as $pro)
            <tr class="task">
                <td>{{ $pro->ID }}</td>
                <td>{{ $pro->P_Name }}</td>
                <td>{{ $pro->Barcode }}</td>
                <td>${{ $pro->P_Price }}</td>
                <td>{{ $pro->Available_Units }}</td>
                <td>{{ $pro->P_Status }}</td>
                <td class="orderDate">{{ $pro->P_Date }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total Amount/ Total Order</strong></td>
                <td id="totalAmount"></td>
                <td id="totalOrders"></td>
            </tr>
        </tfoot>
    </table>

    <div class="mt-4 no-print" style="padding-bottom:100px;">
        <a href="{{ url('/order') }}" class="btn">Back</a>
        <button onclick="window.print()" class="btn">Print</button>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });

    function filterReports() {
        const startDate = new Date($('#startDate').val());
        const endDate = new Date($('#endDate').val());

        $('#reportTableBody tr').each(function() {
            const orderDate = new Date($(this).find('.orderDate').text());
            const totalPrice = parseFloat($(this).find('.totalPrice').text());

            if (orderDate >= startDate && orderDate <= endDate) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    function filterOrders() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toUpperCase();
        const tasks = document.getElementsByClassName('task');

        for (let i = 0; i < tasks.length; i++) {
            const task = tasks[i];
            const txtValue = task.textContent || task.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                task.style.display = "";
            } else {
                task.style.display = "none";
            }
        }
    }
</script>
</body>
</html>
