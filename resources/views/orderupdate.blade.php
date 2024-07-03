<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/add_order.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/order-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/MainStyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
  .container {
      margin-top: 200px;
      background-color: #f7f7f7;
      font-family: 'Inter';
      padding: 50px;
      border-radius: 5px;
      box-shadow: 2px 2px 5px rgba(160, 160, 160, 0.5);
  }
  .row {
      padding-top: 10px;
  }
  label {
      font-size: 20px;
      font-weight: 200;
  }
  #totalPrice {
      font-size: 20px;
      font-weight: 200;
  }
  #customer {
      width: 200px;
      height: 30px;
      font-size: 18px;
      border-radius: 3px;
  }
  textarea {
      width: 520px;
      height: 250px;
      font-size: 18px;
      border-radius: 3px;
  }
  #products {
      width: 350px;
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
</style>
<body>
    <div class="dashboard">
        <div class="div">
            <div class="segmented-control">
                <a href="{{ url('/customer') }}"><button class="btn2">Customers</button></a>
                <a href="{{ url('/order') }}"><button class="btn2">Orders</button></a>
                <a href="{{ url('/payment') }}"><button class="btn2">Payments</button></a>
                <a href="{{ url('/expances') }}"><button class="btn2">Expenses</button></a>
                <a href="{{ url('/product') }}"><button class="btn2">Products</button></a>
            </div>
            <div class="navigation">
                <div class="avatar">
                    <a style="font-size:18px; margin-top:5px; font-family:inter; font-weight:500;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <a href="{{ url('/dashboard') }}"><div class="text-wrapper-2">Dashboard </div></a>
            </div>
            <div class="container">
                <h2>Update Order</h2>
                <form action="{{ route('order.update', $order->Order_ID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Order ID (Hidden) -->
                    <input type="hidden" name="Order_ID" value="{{ $order->Order_ID }}">

                    <!-- Select Customer -->
                    <div class="row">
                        <label for="customer">Select Customer</label>
                    </div>
                    <div class="row">
                        <select name="Customer_ID" id="customer" required>
                            @foreach($customers as $cus)
                                <option value="{{ $cus->id }}" {{ $cus->id == $order->Customer_ID ? 'selected' : '' }}>{{ $cus->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label>Description</label>
                            </div>
                            <div class="row">
                                <textarea type="text" name="description" id="description">{{ $order->description }}</textarea>
                            </div>
                        </div>
                        <!-- Select Products -->
                        <div class="col-md-6" style="margin-top: -30px;">
                            <div class="row">
                                <label for="products">Products</label>
                            </div>
                            <div class="row">ID &nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;&nbsp; Available Units</div>
                            <div class="row">
                                <select name="products[]" id="products" multiple required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->ID }}" data-available-units="{{ $product->Available_Units }}"
                                            {{ in_array($product->ID, $order->ProductIDs) ? 'selected' : '' }}>
                                            {{ $product->ID }} &nbsp;&nbsp;&nbsp; {{ $product->P_Name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $product->Available_Units }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Enter Prices -->
                        <label for="prices">Prices</label>
                        <div id="priceInputs">
                            @foreach($orderPrices as $productID => $price)
                                <input type="number" step="0.01" name="prices[{{ $productID }}]" value="{{ $price }}" placeholder="Price for product {{ $productID }}" required>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <!-- Enter Units -->
                        <label for="units">Units</label>
                        <div id="unitInputs">
                            @foreach($orderUnits as $productID => $units)
                                <input type="number" name="units[{{ $productID }}]" value="{{ $units }}" placeholder="Units for product {{ $productID }}" required data-available-units="{{ $products->firstWhere('ID', $productID)->Available_Units }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <!-- Total Price -->
                        <label>Total Price</label>
                        <div id="totalPrice">Total Price: ${{ $order->TotalPrice }}</div>
                        <input type="hidden" name="totalPrice" id="hiddenTotalPrice" value="{{ $order->TotalPrice }}">
                    </div>
                    <div class="row">
                        <button type="submit" class="element-button2">
                            <div class="text-wrapper-3">Submit Order</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('products').addEventListener('change', function () {
            var selectedProducts = Array.from(this.selectedOptions).map(option => ({
                id: option.value,
                availableUnits: option.getAttribute('data-available-units')
            }));
            var priceInputs = document.getElementById('priceInputs');
            var unitInputs = document.getElementById('unitInputs');

            // Clear previous inputs
            priceInputs.innerHTML = '';
            unitInputs.innerHTML = '';

            selectedProducts.forEach(product => {
                var priceInput = document.createElement('input');
                priceInput.type = 'number';
                priceInput.step = '0.01';
                priceInput.name = 'prices[' + product.id + ']';
                priceInput.placeholder = 'Price for product ' + product.id;
                priceInput.required = true;
                priceInput.addEventListener('input', calculateTotalPrice);
                priceInputs.appendChild(priceInput);

                var unitInput = document.createElement('input');
                unitInput.type = 'number';
                unitInput.name = 'units[' + product.id + ']';
                unitInput.placeholder = 'Units for product ' + product.id;
                unitInput.required = true;
                unitInput.setAttribute('data-available-units', product.availableUnits);
                unitInput.addEventListener('input', function() {
                    if (parseFloat(this.value) > parseFloat(product.availableUnits)) {
                        alert('Units entered exceed available units for product ' + product.id);
                        this.value = '';
                    }
                    calculateTotalPrice();
                });
                unitInputs.appendChild(unitInput);
            });

            // Calculate the total price initially
            calculateTotalPrice();
        });

        function calculateTotalPrice() {
            var priceInputs = Array.from(document.querySelectorAll('#priceInputs input'));
            var unitInputs = Array.from(document.querySelectorAll('#unitInputs input'));
            var totalPrice = 0;

            priceInputs.forEach((priceInput, index) => {
                var price = parseFloat(priceInput.value) || 0;
                var units = parseFloat(unitInputs[index].value) || 0;
                totalPrice += price * units;
            });

            var totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.textContent = 'Total Price: $' + totalPrice.toFixed(2);

            // Update the hidden input field with the total price
            document.getElementById('hiddenTotalPrice').value = totalPrice.toFixed(2);
        }
    </script>
</body>
</html>