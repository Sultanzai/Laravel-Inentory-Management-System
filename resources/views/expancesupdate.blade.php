<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
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
        <h2>Update Expenses</h2>
        <form action="{{ route('expances.update', $expances->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="P_Amount"> Name</label>
                <input type="text" id="Customer Name" name="E_Name" value="{{ old('E_Name', $expances->E_Name) }}" required>
            </div>
            <div class="form-group">
                <label for="Order_ID">Description</label>
                <input type="text" id="Address" name="E_Descriptio" value="{{ old('E_Descriptio', $expances->E_Descriptio) }}" required>
            </div>
            <div class="form-group">
                <label for="Customer_ID">Amount</label>
                <input type="text" id="Phone" name="E_Amount" value="{{ old('E_Amount', $expances->E_Amount) }}" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
