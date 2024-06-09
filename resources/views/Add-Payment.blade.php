<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/add_order.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}">

    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
 #order{
    width: 700px;
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
    padding: 8px;
    border-radius: 5px;
  }

  select{
    height: 24px;
    width: 130px;
  }

  table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
        text-align: left;
    }
    tr:hover {
        background-color: #f5f5f5;
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
          <div class="text-wrapper-2">Payment Order</div>
        </div>
        <a href="{{url('/Payment')}}"><button class="element-button"><div class="text-wrapper-3">Back</div></button></a>
        




      <div class="container">

  <form action="/Paymentform" method="POST">
    @csrf

      <div class="row">
          <table>
              <thead>
                  <tr>
                      <th>Customer</th>
                      <th>Product Names</th>
                      <th>Total Price</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td colspan="4">
                      
                          <select name="Order_ID" id="order" required style="width: 100%;">
                            
                              @foreach($orderviews as $order)
                                  <option value="{{ $order->Order_ID }}" data-customer-id="{{ $order->Customer_ID }}">
                                      {{ $order->Customer_Name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      {{ $order->ProductNames }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      ${{ $order->TotalPrice }}
                                  </option>
                              @endforeach
                          </select>
                          <input type="hidden" name="Customer_ID" id="customer_id">

                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
            <div class="row" style="margin-left: 0;">
              <!-- Enter Prices -->
              <div class="row">
                <label for="prices">Payment Amount</label>
              </div>
              <div class="row">
                <input type="text" name="PaymentAmount" id="">
              </div>
            </div>
            
            <div class="row">
              <!-- Enter Units -->
              <label for="units">Payment Type</label>&nbsp;&nbsp;&nbsp;
              <select name="Type" id="P_Type">
               <option value="Cash">Cash</option>
               <option value="Credit">Credit</option>
               <option value="Bank Check">Bank Check</option>
              </select>
           </div>

          <div class="row">
             <!-- Enter Units -->
             <label for="units">Payment Status</label>&nbsp;&nbsp;&nbsp;
             <select name="Status" id="P_status">
              <option value="Paid">Paid</option>
              <option value="Unpaid">Unpaid</option>
              <option value="Under Process">Under Process</option>
             </select>
          </div>

          <div class="row">
            <a href="{{url('/payment')}}"><button type="submit" class="element-button2"> <div class="text-wrapper-3"> Submit Payment</div></button></a>
          </div>
  </form>
        
      </div>
      



      </div>
    </div>



      <script>
      document.getElementById('order').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var customerId = selectedOption.getAttribute('data-customer-id');
            console.log('Selected Customer ID:', customerId); // Debugging line
            document.getElementById('customer_id').value = customerId;
        });

        // Trigger the change event manually on page load to set the initial value
        document.getElementById('order').dispatchEvent(new Event('change'));
      </script>


  </body>
</html>
