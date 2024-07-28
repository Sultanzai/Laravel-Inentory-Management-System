<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
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
            max-width: 150px; /* Adjust the max-width as needed */
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
        <h3>Payment Report</h3>
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
                <th>PaymentID</th>
                <th>Name</th>
                <th>Invoice</th>
                <th>Type</th>
                <th>Status</th>
                <th>Order Amount</th>
                <th>Paid</th>
                <th>Remaining</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody id="reportTableBody">
            @foreach ($sortedData as $sort)
            @if ($sort['TotalPrice'] != $sort['P_Remining'] )
                @php
                    $statusColor = '';
                    if ($sort['P_Status'] == 'Under Process' || $sort['P_Status'] == 'Unpaid') {
                        $statusColor = 'color: red;';
                    } elseif ($sort['P_Status'] == 'Completed') {
                        $statusColor = 'color: green;';
                    }
                @endphp
                <tr class="task">
                    <td>{{ $sort['PaymentID'] }}</td>
                    <td>{{ $sort['Customer_Name'] }}</td>
                    <td>{{ $sort['Order_ID'] }}</td>
                    <td>{{ $sort['P_Type'] }}</td>
                    <td style="{{ $statusColor }}">{{ $sort['P_Status'] }}</td>
                    <td >{{ $sort['TotalPrice'] }}</td>
                    <td class="totalPrice">{{ $sort['P_Amount'] }}</td>
                    <td>{{ $sort['P_Remining'] }}</td>
                    <td class="orderDate">{{ $sort['P_Date'] }}</td>
                </tr>
            @endif
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><strong>Paid Amount</strong></td>
                <td colspan="4" id="totalAmount"></td>
            </tr>
        </tfoot>
    </table>

    <div class="mt-4 no-print" style="padding-bottom:100px;">
        <a href="{{ url('/product') }}" class="btn">Back</a>
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
        calculateTotalAmount();
    });

    function calculateTotalAmount() {
        let totalAmount = 0;
        $('#reportTableBody tr:visible').each(function() {
            const totalPrice = parseFloat($(this).find('.totalPrice').text());
            if (!isNaN(totalPrice)) {
                totalAmount += totalPrice;
            }
        });
        $('#totalAmount').text(totalAmount.toFixed(2));
    }

    function filterReports() {
        const startDate = new Date($('#startDate').val());
        const endDate = new Date($('#endDate').val());

        $('#reportTableBody tr').each(function() {
            const orderDate = new Date($(this).find('.orderDate').text());

            if (orderDate >= startDate && orderDate <= endDate) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        calculateTotalAmount();
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
        calculateTotalAmount();
    }
</script>
</body>
</html>
