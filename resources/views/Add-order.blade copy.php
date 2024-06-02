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
  td{
    padding: 14px;
    padding-left: 100px;
    height: 24px;
    border-bottom: solid 1px #000000;
  }
  tr{
    transition: ease-in;
  }
  tr:hover{
    transform: scale(103%)
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
        
       
        <div class="search2">
          <img class="img" src="img/search.svg" /> <input class="label" type="text" id="search" placeholder="Search products..." autocomplete="off"/>
        </div>


        {{-- Displaying Product data --}}
        <div class="group">
          <div class="overlap-group3" id="product-list">

          </div>
        </div>



        <div class="group-3">
          <div class="customer-name"><h2>Alex</h2></div>

          <div class="products">
            <p>1</p>
            <div class="title"><h2>Halo Vape</h2></div>
            <div class="units">
              <input type="text" name="" id="" placeholder="Units">
            </div>
            <div class="price">
              <input type="text" name="" id="" placeholder="Price">
            </div>
          </div>
          <div class="products">
            <p>2</p>
            <div class="title"><h2>Halo Vape</h2></div>
            <div class="units">
              <input type="text" name="" id="" placeholder="Units">
            </div>
            <div class="price">
              <input type="text" name="" id="" placeholder="Price">
            </div>
          </div>
          <div class="products">
            <p>3</p>
            <div class="title"><h2>Halo Vape</h2></div>
            <div class="units">
              <input type="text" name="" id="" placeholder="Units">
            </div>
            <div class="price">
              <input type="text" name="" id="" placeholder="Price">
            </div>
          </div>
          <div class="products">
            <p>4</p>
            <div class="title"><h2>Halo Vape</h2></div>
            <div class="units">
              <input type="text" name="" id="" placeholder="Units">
            </div>
            <div class="price">
              <input type="text" name="" id="" placeholder="Price">
            </div>
          </div>
          <div class="products">
            <p>5</p>
            <div class="title"><h2>Halo Vape</h2></div>
            <div class="units">
              <input type="text" name="" id="" placeholder="Units">
            </div>
            <div class="price">
              <input type="text" name="" id="" placeholder="Price">
            </div>
          </div>
          <br>
          <div class="products" style="border-top: solid 0.5px rgb(189, 189, 189);">
            
            <div class="title"><h1>Total</h1></div>
            <div class="units">
             <h1>15</h1>
            </div>
            <div class="price">
              <h1>$1500</h1>
            </div>
          </div>
        </div>
        <div class="description">
          <div class="message">
            <textarea placeholder="Description...."></textarea>   
          </div>
        </div>
        
        <button class="button" style="left: 750px;"><div class="text-wrapper-4" style="color: white;">Submit</div></button>

      </div>
    </div>



    <script>
     $(document).ready(function() {
    // Function to fetch and display products
    function fetchProducts(query = '') {
        $.ajax({
            url: "{{ route('products.search') }}",
            type: "GET",
            data: {'query': query},
            success: function(data) {
                $('#product-list').html('');
                
                data.forEach(function(product) {
                    var row = `<tr class="clickable-row" data-href="{{ url('/product') }}/${product.id}">
                                    <td>${product.id}</td>
                                    <td>${product.P_Name}</td>
                                    <td>${product.P_Units}</td>
                                    <td>${product.P_Status}</td>
                                    <td>${product.Barcode}</td>
                                    <td>${product.P_Description}</td>
                                </tr>`;
                    $('#product-list').append(row);
                });

                $('.clickable-row').on('click', function() {
                    window.location = $(this).data('href');
                });
            }
        });
    }

    // Initial fetch to display default data
    fetchProducts();

    // Fetch data on keyup event
    $('#search').on('keyup', function() {
        var query = $(this).val();
        fetchProducts(query);
    });
});
  </script>


  </body>
</html>
