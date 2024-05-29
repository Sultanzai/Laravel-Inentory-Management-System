


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/order-style.css') }}">
  </head>
  <body>
    <div class="dashboard">
      <div class="div">
        <div class="segmented-control">
          <a href="{{url('/customer')}}"><button class="btn2" >Customers</button></a>
          <a href="{{url('/order')}}"><button class="btn2"  >Orders</button></a>
          <a href="{{url('/payment')}}"><button class="btn2" >Payments</button></a>
          <a href="{{url('/expances')}}"><button class="btn2" >Expances</button></a>
        </div>
        <div class="navigation">
          <div class="avatar">
            <div class="rectangle-wrapper"><img class="rectangle" src="img/rectangle-1.png" /></div>
            <img class="img" src="img/chevron-down.svg" />
          </div>
          <img class="buttons" src="img/buttons.svg" />
          <a href="/Dashboard/Dashboard.html"><div class="text-wrapper-2">Dashboard</div></a>
        </div>
        <div class="list">
          <div class="text-wrapper-4">Expanses</div>
          <div class="search">
            <img class="img" src="img/search.svg" /> <input class="label" placeholder="Search..." type="text"/>
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">No</div>
              <div class="text-wrapper-6">NAME</div>
              <div class="text-wrapper-7">DESCRIPTION </div>
              <div class="text-wrapper-8"></div>
              <div class="text-wrapper-9"></div>
              <div class="text-wrapper-9">Amount</div>
              <div class="text-wrapper-9">Date</div>
              <div class="text-wrapper-9"></div>
            </div>

            @foreach ($expances as $exp)
              <div class="task">
                <div class="text-wrapper-12">{{ $exp->id }}</div>
                <div class="text-wrapper-13">{{ $exp->E_Name }}</div>
                <div class="text-wrapper-14" style="width: 590px;">{{ $exp->E_Descriptio }}</div>
                <div class="pill">
                  <div class="tag"><div class="label-2">{{ $exp->E_Amount }}</div></div>
                </div>
                <div class="tag-wrapper">
                  <div class="label-wrapper"><div class="label-2" style="margin-left: -45px;">{{ $exp->E_Date }}</div></div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
        <a href="{{url('/expancesform')}}"><div class="element-button-2"><button class="mybtn">Add New Expanses</button></div></a>
      </div>
    </div>


    <!-- Pop Up adding expances -->
     <!-- Pop Up form -->
     <div class="popup" id="popupForm">
      <div class="popup-content">
          <button class="close-btn" onclick="closeForm()">&times;</button>
          <h2>Add Expanses</h2>
          <form>
              <input type="text" placeholder="Name" required>
              <input type="text" placeholder="Phone" required>
              <input type="text" placeholder="Address" required>
              <button type="submit" class="submit-btn">Submit</button>
          </form>
      </div>
  </div>
  </div>
</div>

<script>
function openForm() {
  document.getElementById("popupForm").style.display = "flex";
}

function closeForm() {
  document.getElementById("popupForm").style.display = "none";
}
</script>
  </body>
</html>
