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
    </style>
</head>
<body>

    <script>
        @if($errors->has('error'))
            alert('{{ $errors->first('error') }}');
        @endif
    </script>

    <div class="form-container">
        <h2>Add Stock</h2>
 
        <form action="{{ route('addStock') }}" method="POST">
            @csrf
            <div class="row">
                <label for="customer">Select Product</label>
            </div>
            <div class="row">
                <select name="id" id="ProductID" required style="width: 200px; height:30px;">
                    @foreach($product as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $pro->P_Name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="P_Price">Price:</label>
                <input type="text" id="P_Price" name="P_Price" required>
            </div>
            <div class="form-group">
                <label for="P_Units">Units:</label>
                <input type="text" id="P_Units" name="P_Units" required>
            </div>
            <div class="form-group">
                <label for="P_Status">Status:</label>
                <select name="P_Status" id="P_Status">
                    <option value="In Stock">In Stock</option>
                    <option value="Out Of stock">Out Of stock</option>
                    <option value="Shipped">Shipped</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const orderSelect = document.getElementById('ProductID');
                const totalPriceInput = document.getElementById('TotalPrice');
                const addstock = document.getElementById('addstock');
    
                orderSelect.addEventListener('change', function () {
                    const selectedOption = orderSelect.options[orderSelect.selectedIndex];
                    const totalPrice = selectedOption.getAttribute('data-totalprice');
                    totalPriceInput.value = totalPrice;
                });
    
                // Trigger change event to set initial value
                orderSelect.dispatchEvent(new Event('change'));
    
                // Add event listener for form submission
                addstock.addEventListener('submit', function (event) {
                    const totalPrice = parseFloat(totalPriceInput.value);
                    const Units = parseFloat(document.getElementById('Units').value);
    
                    // Calculate remaining amount
                    const Totalunits = totalPrice + Units;
    

                });
            });
        </script> --}}
</body>
</html>
