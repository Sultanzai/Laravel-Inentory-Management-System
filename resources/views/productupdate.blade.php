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
        textarea{
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Product</h2>
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="P_Name">Product Name:</label>
                <input type="text" id="Name" name="P_Name" value="{{ old('P_Name', $product->P_Name) }}" required>
            </div>
            <div class="form-group">
                <label for="P_Description">Product Description Type:</label>
                <input name="Description" id="P_Description" cols="30" rows="10" Value="{{ old('P_Description', $product->P_Description) }}"></input>
            </div>
            <div class="form-group">
                <label for="P_Units">Product Units:</label>
                <input type="number" id="Units" name="P_Units" value="{{ old('P_Units', $product->P_Units) }}" required>
            </div>
            <div class="form-group">
                <label for="P_Price">Price:</label>
                <input type="text" id="Price" name="P_Price" value="{{ old('P_Price', $product->P_Price) }}" required>
            </div>
            <div class="form-group">
                <label for="P_Status">Product Status</label>
                <select id="P_Status" name="P_Status" required>
                    <option value="In Stock" {{ old('P_Status', $product->P_Status) == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                    <option value="Out Of stock" {{ old('P_Status', $product->P_Status) == 'Out Of stock' ? 'selected' : '' }}>Out Of stock</option>
                    <option value="Shipped" {{ old('P_Status', $product->P_Status) == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Barcode">Product Barcode</label>
                <input type="number" id="code" name="Barcode" value="{{ old('Barcode', $product->Barcode) }}">
            </div>
            <div class="form-group">
                <button type="submit">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>
