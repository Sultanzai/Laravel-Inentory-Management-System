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
            width: 400px;
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

        .form-group input, .form-group select, textarea {
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
        <h2>Add Invoice</h2>
          <form action="/AddCompany" method="POST">
            @csrf
            <div class="form-group">
                <label for="P_Amount">Name:</label>
                <input type="text" id="compamy" name="companyname" required>
            </div>
            <div class="form-group">
                <label for="P_Amount">Phone:</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Completed">Completed</option>
                    <option value="Under Process">Under Process</option>
                    <option value="Unpaid">Unpaid</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Type">Payment Type</label>
                <select id="Type" name="Type">
                    <option value="Cash">Cash</option>
                    <option value="Check">Check</option>
                    <option value="ZELLE">ZELLE</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="P_Amount">Description:</label>
                <textarea type="text" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="P_Amount">Amount:</label>
                <input type="text" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>
