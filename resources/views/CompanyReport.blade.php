<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Bill Details</title>
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
            max-width: 100px; /* Adjust the max-width as needed */
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
    </style>
    <!-- jQuery and Bootstrap Datepicker CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row" style="font-size: 20px;">  
        <h3>Company Bill Report</h3>
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
                <th>Name</th>
                <th>Contact</th>
                <th style="width: 450px;">Description</th>
                <th>Status</th>
                <th>Type</th>
                <th>Payment</th>
            </tr>
        </thead>
        <tbody id="reportTableBody">
            @foreach ($company as $comp)
            <tr class="task">
                <td>{{ $comp->C_Name }}</td>
                <td>{{ $comp->C_Phone }}</td>
                <td style="width: 400px;">{{ $comp->C_Description }}</td>
                <td>{{ $comp->C_Status }}</td>
                <td>{{ $comp->C_Type }}</td>
                <td>{{ $comp->C_Amount }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>

    <div class="mt-4 no-print" style="padding-bottom:100px;">
        <a href="{{ url('/Company-Page') }}" class="btn">Back</a>
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
