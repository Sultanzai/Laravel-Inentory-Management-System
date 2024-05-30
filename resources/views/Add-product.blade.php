<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/Dashboardstyle.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
  body{
    min-height: 900px;
  }
  .container{
    margin-top: -100px;
  }
.container h3{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-size: 18px;
}
.container input{
  width: 250px;
  height: 30px;
  border: solid 1px #000000;
  border-radius: 3px;
}
.btn{
            
            background-color: #000000;
            color: #f0f0f0;
            font-size: 18px;
            border-radius: 5px;
            padding: 10px;
            width: 130px;
            margin-left: -13%;

        }
.btn3{
            margin-top: 20px;
            background-color: #000000;
            color: #f0f0f0;
            font-size: 18px;
            border-radius: 5px;
            padding: 10px 20px;

        }
#scanned-data{
  font-size: 24px;
}


</style>
  </head>
  <body>
    <div class="dashboard">
      <div class="div" style="height: 200px;">
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <a href="{{url('/dashboard')}}"><div class="text-wrapper-17">Dashboard</div></a>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <form action="/productform" method="POST">
        @csrf
        <div class="col-md-6">
          <div class="row">
            <h3>Product Name</h3>
          <input type="text" name="Name" id="" placeholder="Name" required>
          </div>
          <div class="row">
            <h3>Quantity</h3>
          <input type="text" name="Units" id="" placeholder="Quantity" required>
          </div>
          <div class="row">
            <h3>Cost</h3>
          <input type="text" name="Price" id="" placeholder="Cost" required>
          </div>
          <div class="row">
            <h3>Barcode</h3>
          <input type="text" name="Barcode" id="barcode-input" placeholder="55555" required>
          </div>
          <div class="row">
            <h3>Description</h3>
            <textarea name="Description" id="" cols="50" rows="10" ></textarea>
          </div>
          <div class="row">
            <h3>Order Status</h3>
            <Select name="Status" id="data-select">
              <option value="In Stock">In Stock</option>
              <option value="Out Of stock">Out Of stock</option>
              <option value="Shipped">Shipped</option>
            </Select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
          <h1>Barcode Scanner</h1>
          <div id="interactive" class="viewport"></div>
          <div id="scanned-data"></div>
          <div class="row">
            <div class="col-md-3">          
              <button onclick="startScanner()" class="btn3">Start Scanning</button>
            </div>
            <div class="col-md-3">          
              <button onclick="stopScanner()" class="btn3">Stop Scanning</button>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top:20px;">
          <div class="col-md-3">
            <button type="submit" class="btn">Submit</button>
          </div>
          <div class="col-md-3">
            <a href="{{url('/product')}}"><button class="btn">Cancel</button> </a>
          </div>
        </div>
      </form>
      </div>
    </div>







    <script>
      function startScanner() {
          Quagga.init({
              inputStream: {
                  name: "Live",
                  type: "LiveStream",
                  target: document.querySelector('#interactive'),
                  constraints: {
                      width: 540,
                      height: 280,
                      facingMode: "environment"
                  },
              },
              decoder: {
                  readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "code_39_vin_reader", "codabar_reader", "upc_reader", "upc_e_reader", "i2of5_reader", "2of5_reader", "code_93_reader"]
              },
          }, function (err) {
              if (err) {
                  console.log(err);
                  return
              }
              console.log("Initialization finished. Ready to start");
              Quagga.start();
          });

          Quagga.onDetected(function (data) {
              var scannedCode = data.codeResult.code;
              document.getElementById('scanned-data').innerText = `Scanned Data: ${scannedCode}`;
              document.getElementById('barcode-input').placeholder = scannedCode;
              console.log(data);
          });
      }

      function stopScanner() {
          Quagga.stop();
      }
  </script>
  </body>
</html>
