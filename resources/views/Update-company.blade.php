<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Company Bill</title>
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
            font-family: Arial, sans-serif;

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
        <h2>Update Company Bill</h2>
        <form action="{{ route('company.update', $company->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="P_Amount">Name:</label>
                <input type="text" id="C_Name" name="C_Name" value="{{ old('C_Name', $company->C_Name) }}" required>
            </div>
            <div class="form-group">
                <label for="P_Amount">Contact:</label>
                <input type="text" id="C_Phone" name="C_Phone" value="{{ old('C_Phone', $company->C_Phone) }}">
            </div>
            <div class="form-group">
                <label for="P_Amount">Description:</label>
                <textarea id="C_Description" name="C_Description">{{ old('C_Description', $company->C_Description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="P_Amount">Amount:</label>
                <input type="text" id="C_Amount" name="C_Amount" value="{{ old('C_Amount', $company->C_Amount) }}" required>
            </div>
            <div class="form-group">
                <label for="C_Status">Payment Status:</label>
                <select id="C_Status" name="C_Status" required>
                    <option value="Under Process" {{ old('C_Status', $company->C_Status) == 'Under Process' ? 'selected' : '' }}>Under Process</option>
                    <option value="Completed" {{ old('C_Status', $company->C_Status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="C_Type">Payment Type:</label>
                <select id="C_Type" name="C_Type" required>
                    <option value="Cash" {{ old('C_Type', $company->C_Type) == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Check" {{ old('C_Type', $company->C_Type) == 'Check' ? 'selected' : '' }}>Check</option>
                    <option value="ZELLE" {{ old('C_Type', $company->C_Type) == 'ZELLE' ? 'selected' : '' }}>ZELLE</option>
                    <option value="Bank Transfer" {{ old('C_Type', $company->C_Type) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Update Payment</button>
            </div>
        </form>
    </div>
</body>
</html>
