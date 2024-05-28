<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset ('css/globals.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/customer-style.css') }}" />
    <link rel="stylesheet" href="{{asset ('css/MainStyle.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <a href="/Dashboard/Dashboard.html"><div class="text-wrapper-2">Dashboard </div></a>
        </div>
        <div class="list">
          <div class="text-wrapper-4">Customer</div>
          <div class="search">
            <img class="img" src="img/search.svg" /> <input class="label" placeholder="Search..." type="text" />
          </div>
          <div class="list-2">
            <div class="navbar">
              <div class="text-wrapper-5">Number</div>
              <div class="text-wrapper-6">Name</div>
              <div class="text-wrapper-7">Address</div>
              <div class="text-wrapper-8">Contact</div>
              <div class="text-wrapper-9">Balance</div>
            </div>
{{-- Displaying Record from database --}}
            @foreach ($customer as $cus)
            <div class="task">
              <div class="text-wrapper-10">{{ $cus->id }}</div>
              <div class="text-wrapper-11">{{ $cus->Name }}</div>
              <p class="p">{{ $cus->Address }}</p>
              <div class="text-wrapper-12">{{ $cus->Phone }}</div>
              <div class="pill">
                <div class="tag"><div class="label-2">{{ $cus->Balance }}</div></div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        
        <div class="element-button-2"><button class="mybtn" id="openFormBtn">Add New Customer</button></div>
        
        <!-- Pop Up form -->
        <div class="popup" id="popupForm">
          <div class="popup-content">
              <button class="close-btn">&times;</button>
              <h2>Add New Customer</h2>
              
              <form id="customerForm">
                @csrf
                <input type="text" id="Name" name="Name" placeholder="Name" required>
                <input type="text" id="Phone" name="Phone" placeholder="Phone" required>
                <input type="text" id="Address" name="Address" placeholder="Address" required>
                <button type="submit" class="submit-btn">Submit</button>
              </form>
              
          </div>
      </div>
      </div>
    </div>
    
<script>
  $(document).ready(function() {
    // Open the form
    $("#openFormBtn").click(function() {
        $("#popupForm").css("display", "block");
    });

    // Close the form
    $(".close-btn").click(function() {
        $("#popupForm").css("display", "none");
    });

    // Submit the form via AJAX
    $("#customerForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '/customers',
            type: 'POST',
            data: {
                name: $("#Name").val(),
                email: $("#Address").val(),
                phone_number: $("#Phone").val(),
                _token: '{{ csrf_token() }}'  // Include CSRF token for security
            },
            success: function(response) {
                alert("Customer created successfully!");
                $("#popupForm").css("display", "none");
                $("#customerForm")[0].reset();
            },
            error: function(response) {
                alert("An error occurred while creating the customer.");
            }
        });
    });
});

</script>

  </body>
</html>
