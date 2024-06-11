<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/add_order.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}">

    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>

  .container{
    margin-top: 200px;
    background-color: #f7f7f7;
    font-family: 'Inter';
    padding: 50px;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(160, 160, 160, 0.5);

  }
  .row{
    padding-top: 10px;
  }
  label{
    font-size: 20px;
    font-weight: 200;
  }
  #totalPrice{
    font-size: 20px;
    font-weight: 200;
  }
  #customer{
    width: 200px;
    height: 30px;
    font-size: 18px;
    border-radius: 3px;
  }
  textarea{
    width: 520px;
    height: 250px;
    font-size: 18px;
    border-radius: 3px;

  }
  #products{
    width: 350px;
    height: 250px;
    font-size: 18px;
    border-radius: 3px;
  }
  #products option{
    margin-top: 5px;
    margin-bottom: 5px;
    border-bottom: solid 0.5px #505050;
    transition: ease-in;
  }
  #products option:hover{
    box-shadow: 2px 2px 5px rgba(127, 127, 127, 0.5);
    border-bottom: solid 0.5px #000000;
  }
  .element-button2{
    background-color: #000000;
    padding: 10px;
    border-radius: 5px;
  }
</style>
  </head>

  <body>
    <div class="dashboard">
      <div class="div">
      
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <div class="text-wrapper-2">Customer Orders</div>
        </div>
        <a href="{{url('/order')}}"><button class="element-button"><div class="text-wrapper-3">Back</div></button></a>

        <div class="container">

          <form action="{{ route('order.update', $orderupdate->id) }}" method="POST">
            @csrf
        
            <!-- Select Customer -->
            <div class="row">
                <label for="customer">Select Customer</label>
            </div>
            <div class="row">
                <select name="Customer_ID" id="customer" required>
                    @foreach($customers as $cus)
                        <option value="{{ $cus->id }}" {{ $cus->id == old('Customer_ID', $orderupdate->Customer_ID) ? 'selected' : '' }}>
                            {{ $cus->Name }}
                        </option>
                    @endforeach
                </select>
            </div> 
        
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <label>Description</label> 
                    </div>
                    <div class="row">
                        <textarea name="description" id="description">{{ old('description', $orderupdate->description) }}</textarea>
                    </div>
                </div>
        
                <!-- Select Products -->
                <div class="col-md-6">
                    <div class="row">            
                        <label for="products">Products</label>
                    </div>
                    <div class="row">
                        <select name="products[]" id="products" multiple required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                    {{ in_array($product->id, old('products', $orderupdate->products->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $product->id }} &nbsp;&nbsp;&nbsp; {{ $product->P_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <!-- Enter Prices -->
                <label for="prices">Prices</label>
                <div id="priceInputs"></div>
            </div>
        
            <div class="row">
                <!-- Enter Units -->
                <label for="units">Units</label>
                <div id="unitInputs"></div>
            </div>
        
            <div class="row">
                <!-- Enter Units -->
                <label>Total Price</label>
                <div id="totalPrice"></div>
                <input type="hidden" name="totalPrice" id="hiddenTotalPrice">
            </div>
        
            <div class="row">
                <a href="{{url('/order')}}"><button type="submit" class="element-button2"><div class="text-wrapper-3">Submit Order</div></button></a>
            </div>
        </form>

        </div>
      </div>
    </div>



  <script>
   document.getElementById('products').addEventListener('change', function () {
        var selectedProducts = Array.from(this.selectedOptions).map(option => option.value);
        generatePriceAndUnitInputs(selectedProducts);
    });

    document.addEventListener('DOMContentLoaded', function () {
        var selectedProducts = Array.from(document.getElementById('products').selectedOptions).map(option => option.value);
        generatePriceAndUnitInputs(selectedProducts);
    });

    function generatePriceAndUnitInputs(selectedProducts) {
        var priceInputs = document.getElementById('priceInputs');
        var unitInputs = document.getElementById('unitInputs');

        // Clear previous inputs
        priceInputs.innerHTML = '';
        unitInputs.innerHTML = '';

        selectedProducts.forEach(productId => {
            var priceInput = document.createElement('input');
            priceInput.type = 'number';
            priceInput.name = 'prices[' + productId + ']';
            priceInput.placeholder = 'Price for product ' + productId;
            priceInput.required = true;
            priceInput.value = '{{ old('prices[' + productId + ']', $orderupdate->products->find(' + productId + ')->pivot->price ?? '') }}';
            priceInput.addEventListener('input', calculateTotalPrice);
            priceInputs.appendChild(priceInput);

            var unitInput = document.createElement('input');
            unitInput.type = 'number';
            unitInput.name = 'units[' + productId + ']';
            unitInput.placeholder = 'Units for product ' + productId;
            unitInput.required = true;
            unitInput.value = '{{ old('units[' + productId + ']', $orderupdate->products->find(' + productId + ')->pivot->units ?? '') }}';
            unitInput.addEventListener('input', calculateTotalPrice);
            unitInputs.appendChild(unitInput);
        });

        // Calculate the total price initially
        calculateTotalPrice();
    }

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
      

  {{-- <script>
    document.getElementById('products').addEventListener('change', function () {
        var selectedProducts = Array.from(this.selectedOptions).map(option => option.value);
        var priceInputs = document.getElementById('priceInputs');
        var unitInputs = document.getElementById('unitInputs');

        // Clear previous inputs
        priceInputs.innerHTML = '';
        unitInputs.innerHTML = '';

        selectedProducts.forEach(productId => {
            var priceInput = document.createElement('input');
            priceInput.type = 'number';
            priceInput.name = 'prices[' + productId + ']';
            priceInput.placeholder = 'Price for product ' + productId;
            priceInput.required = true;
            priceInputs.appendChild(priceInput);

            var unitInput = document.createElement('input');
            unitInput.type = 'number';
            unitInput.name = 'units[' + productId + ']';
            unitInput.placeholder = 'Units for product ' + productId;
            unitInput.required = true;
            unitInputs.appendChild(unitInput);
        });
    });
  </script> --}}


  </body>
</html>
