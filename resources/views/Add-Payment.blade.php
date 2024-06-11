<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="date"] {
            padding: 7px;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #373737;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #000000;
            border: none;
            border-radius: 4px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #141414;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Payment</h2>
        <form action="{{ route('payment.update', $payment->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="P_Amount">Payment Amount:</label>
                <input type="text" id="P_Amount" name="P_Amount" value="{{ old('P_Amount', $payment->P_Amount) }}" required>
            </div>
            <div class="form-group">
                <label for="P_Type">Payment Type:</label>
                <select id="P_Type" name="P_Type" required>
                    <option value="Credit Card" {{ old('P_Type', $payment->P_Type) == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="Debit Card" {{ old('P_Type', $payment->P_Type) == 'Debit Card' ? 'selected' : '' }}>Debit Card</option>
                    <option value="PayPal" {{ old('P_Type', $payment->P_Type) == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                    <option value="Bank Transfer" {{ old('P_Type', $payment->P_Type) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="P_Status">Payment Status:</label>
                <select id="P_Status" name="P_Status" required>
                    <option value="Pending" {{ old('P_Status', $payment->P_Status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('P_Status', $payment->P_Status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Failed" {{ old('P_Status', $payment->P_Status) == 'Failed' ? 'selected' : '' }}>Failed</option>
                    <option value="Refunded" {{ old('P_Status', $payment->P_Status) == 'Refunded' ? 'selected' : '' }}>Refunded</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Order_ID">Order ID:</label>
                <input type="text" id="Order_ID" name="Order_ID" value="{{ old('Order_ID', $payment->Order_ID) }}" required>
            </div>
            <div class="form-group">
                <label for="Customer_ID">Customer ID:</label>
                <input type="text" id="Customer_ID" name="Customer_ID" value="{{ old('Customer_ID', $payment->Customer_ID) }}" required>
            </div>
            <div class="form-group">
                <label for="P_Date">Payment Date:</label>
                <input type="date" id="P_Date" name="P_Date" value="{{ old('P_Date', $payment->P_Date) }}" required>
            </div>
            <div class="form-group">
                <button type="submit">Update Payment</button>
            </div>
        </form>
    </div>
</body>
</html>
