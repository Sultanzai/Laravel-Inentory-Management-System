<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/add_order.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  form{
    margin-top: 200px;
    background-color: red;
  }
#customer{
  width: 400px;
  height: 50px;
  color: black;
}
#products{
  margin-top: 20px;
  width: 400px;
  height: 200px;
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
        <a href="/Dashboard/Order-page.html"><button class="element-button"><div class="text-wrapper-3">Back</div></button></a>
        





        <form action="{{ route('orderstore') }}" method="POST">
          @csrf
      
          <!-- Select Customer -->
          <label for="customer">Customer:</label >
          <select name="id" id="customer" required>
              @foreach($customers as $cus)
                  <option value="{{ $cus->id }}">{{ $cus->Name }}</option>
              @endforeach
          </select>
          <p>Total:</p><input type="text" name="total" id="total">
      <br>
          <!-- Select Products -->
          <label for="products">Products:</label>
          <select name="products[]" id="products" multiple>
              @foreach($products as $product)
                  <option value="{{ $product->id }}">{{ $product->P_Name }}</option>
              @endforeach
          </select>
      <br>
          <!-- Enter Prices -->
          <label for="prices">Prices:</label>
          <div id="priceInputs"></div>
      
          <button type="submit">Submit Order</button>
      </form>
      



      </div>
    </div>



  <script>
    document.getElementById('products').addEventListener('change', function() {
        let selectedProducts = Array.from(this.selectedOptions).map(option => option.value);
        let priceInputs = document.getElementById('priceInputs');
        priceInputs.innerHTML = '';

        selectedProducts.forEach(productId => {
            let input = document.createElement('input');
            input.type = 'number';
            input.name = `prices[${productId}]`;
            input.placeholder = `Price for Product ID ${productId}`;
            input.required = true;
            priceInputs.appendChild(input);
        });
    });
  </script>


  </body>
</html>
