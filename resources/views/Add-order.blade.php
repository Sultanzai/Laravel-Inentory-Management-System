<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/add_order.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/order-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/MainStyle.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .container {
            margin-top: 200px;
            background-color: #f7f7f7;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(160, 160, 160, 0.5);
        }
        select{
            width: 100%;
            height: 30px;
            font-size: 20px;
        }
        textarea{
            width: 100%;
            font-size: 20px;
        }
        .row {
            padding-top: 10px;
        }
        label {
            font-size: 20px;
            font-weight: 200;
        }
        #products {
            width: 100%;
            height: 250px;
            font-size: 18px;
            border-radius: 3px;
        }
        #products option {
            margin-top: 5px;
            margin-bottom: 5px;
            border-bottom: solid 0.5px #505050;
            transition: ease-in;
        }
        #products option:hover {
            box-shadow: 2px 2px 5px rgba(127, 127, 127, 0.5);
            border-bottom: solid 0.5px #000000;
        }
        .element-button2 {
            background-color: #000000;
            padding: 10px;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
        .delete-button {
            margin-top: 25px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<div class="dashboard">
    <div class="div">
        <div class="navigation">
            <div class="text-wrapper-2">Customer Orders</div>
        </div>
        <a href="{{ url('/order') }}"><button class="element-button"><div class="text-wrapper-3">Back</div></button></a>

        <div class="container">
            <form action="{{ route('orderstore') }}" method="POST">
                @csrf
                <div class="row">
                    <label for="customer">Select Customer</label>
                    <select name="Customer_ID" id="customer" required>
                        @foreach($customers as $cus)
                            <option value="{{ $cus->id }}">{{ $cus->Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label>Description</label>
                    <textarea type="text" name="description" id="description"></textarea>
                </div>
                <div class="row">
                    <label for="products">Products</label>
                    <div>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Available Units</div>
                    <select id="products" multiple required>
                        @foreach($products as $product)
                            @if($product->Available_Units > 0)
                                <option value="{{ $product->ID }}" data-name="{{ $product->P_Name }}" data-available-units="{{ $product->Available_Units }}">
                                    {{ $product->ID }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  {{ $product->P_Name }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $product->Available_Units }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label>Selected Products</label>
                    <div id="selectedProducts"></div>
                </div>
                <div class="row">
                    <label>Total Price</label>
                    <div id="totalPrice">Total Price: $0.00</div>
                    <input type="hidden" name="totalPrice" id="hiddenTotalPrice">
                </div>
                <div class="row">
                    <button type="submit" class="element-button2"><div class="text-wrapper-3">Submit Order</div></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#products').on('dblclick', 'option', function() {
        var productId = $(this).val();
        var productName = $(this).data('name');
        var availableUnits = $(this).data('available-units');

        if ($('#product-' + productId).length === 0) {
            var productRow = `
                <div id="product-${productId}" class="row">
                    <input type="hidden" name="products[]" value="${productId}">
                    <div class="col-md-3">
                        <label>${productName}</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="units[${productId}]" placeholder="Units" required min="1" max="${availableUnits}" class="form-control" onchange="calculateTotalPrice()">
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="prices[${productId}]" placeholder="Price" step="0.01" required class="form-control" onchange="calculateTotalPrice()">
                    </div>
                    <div class="col-md-3" style="margin-top:-25px;">
                        <button type="button" class="delete-button" onclick="removeProduct(${productId})">Delete</button>
                    </div>
                </div>`;
            $('#selectedProducts').append(productRow);
        }
    });

    function calculateTotalPrice() {
        var totalPrice = 0;
        $('#selectedProducts .row').each(function() {
            var units = parseFloat($(this).find('input[name^="units"]').val()) || 0;
            var price = parseFloat($(this).find('input[name^="prices"]').val()) || 0;
            totalPrice += units * price;
        });
        $('#totalPrice').text('Total Price: $' + totalPrice.toFixed(2));
        $('#hiddenTotalPrice').val(totalPrice.toFixed(2));
    }

    window.calculateTotalPrice = calculateTotalPrice;

    window.removeProduct = function(productId) {
        $('#product-' + productId).remove();
        calculateTotalPrice();
    };
});
</script>
</body>
</html>
