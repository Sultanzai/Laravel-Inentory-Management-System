<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: #ffffff;
        }
        td {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }
            th, td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            th::before, td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 12px;
                text-align: left;
                font-weight: bold;
                background-color: #343a40;
                color: #ffffff;
            }
            th::before {
                background-color: #495057;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Information</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Barcode</th>
                    <th>Price</th>
                    <th>Available Quantity</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="No">{{ $item->id }}</td>
                    <td data-label="Name">{{ $item->P_Name }}</td>
                    <td data-label="Barcode">{{ $item->Barcode }}</td>
                    <td data-label="Price">{{ $item->P_Price }}0</td>
                    <td data-label="Available Quantity">{{ $item->P_Units }}</td>
                    <td data-label="Status">{{ $item->P_Status }}</td>
                    <td data-label="Date">{{ $item->P_Date }}</td>
                </tr>
                <!-- Repeat rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
