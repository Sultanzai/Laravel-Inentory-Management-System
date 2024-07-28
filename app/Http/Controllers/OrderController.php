<?php

namespace App\Http\Controllers;

use App\Models\OrderView;
use App\Models\Payment;
use App\Models\ProductOrderDetailView;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\Product;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

use DB;


class OrderController extends Controller
{

    public function index(){

        $orders = OrderView::orderBy('Order_ID', 'desc')->get();
        return view('Order-page', compact('orders'));

    }
    public function Report(){

        $orders = OrderView::orderBy('Order_ID', 'desc')->get();
        return view('SalesReport', compact('orders'));

    }
    // Funtion to pass print data 
    public function printOrder($id)
    {
        $order = OrderView::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        return view('Print-order', compact('order'));
    }

    public function create()
    {
        $customers = Customers::all();
        $products = ProductOrderDetailView::all(); 

        return view('Add-Order', compact('customers','products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'Customer_ID' => 'required|exists:tbl_customer,id',
            'products' => 'required|array',
            'products.*' => 'exists:tbl_product,id',
            'prices' => 'required|array',
            'prices.*' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,4})?$/',
                'min:0'
            ],
            'units' => 'required|array',
            'units.*' => 'numeric|min:0'
        ]);

        $order = Order::create([
            'Customer_ID' => $request->Customer_ID,
            'O_Description' => $request->description
        ]);


        foreach ($request->products as $productID) {
            // Round prices and units to 2 decimal places
            $roundedPrice = round($request->prices[$productID], 2);
            $roundedUnit = round($request->units[$productID], 2);
        
            // Format prices and units to 2 decimal places
            $formattedPrice = number_format($roundedPrice, 2, '.', '');
            $formattedUnit = number_format($roundedUnit, 2, '.', '');
        
            $order->products()->attach($productID, [
                'O_Price' => $formattedPrice,
                'O_unit' => $formattedUnit
            ]);
        }
        // Saving Balance in customer Column
        $customer = Customers::find($request->Customer_ID);
        $customer->Balance += $request->totalPrice;
        $customer->save();
        
        if (!$order) {
            throw new \Exception('Order creation failed');
        }

        $payment = Payment::create([
            'Order_ID' => $order->id,
            'P_Remining' => $request->totalPrice,
            'P_Amount' => 0,
            'P_Type' => 'N/A',
            'P_Status' => 'Unpaid',
            'Customer_ID' => $request->Customer_ID,
        ]);
        
        if (!$payment) {
            throw new \Exception('Payment creation failed');
        }


        return redirect('/order')->with('success','');
    }

    
    public function edit($orderId)
    {
        $order = OrderView::findOrFail($orderId);
        $customers = Customers::all();
        $products = Product::all();
    
        // Decode JSON fields safely
        $orderPrices = json_decode($order->OrderPrices, true);
        $orderUnits = json_decode($order->OrderUnits, true);
    
        // Provide fallback if JSON decoding fails
        if (is_null($orderPrices)) {
            $orderPrices = [];
        }
        if (is_null($orderUnits)) {
            $orderUnits = [];
        }
    
        // Get product IDs from decoded prices
        $order->ProductIDs = array_keys($orderPrices);
    
        return view('orderupdate', compact('order', 'customers', 'products', 'orderPrices', 'orderUnits'));
    }

    // Method to update the order
    public function update(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        $order->Customer_ID = $request->Customer_ID;
        $order->description = $request->description;

        // Update product details
        $prices = $request->prices;
        $units = $request->units;
        $totalPrice = 0;

        foreach ($prices as $productId => $price) {
            $unit = $units[$productId];
            $totalPrice += $price * $unit;
        }

        $order->OrderPrices = json_encode($prices);
        $order->OrderUnits = json_encode($units);
        $order->TotalPrice = $totalPrice;

        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
    
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('/order')->with('success', 'Order Deleted successfully');
    }


    public function netprofit(Request $request)
    { // Initialize query
        $query = DB::table('order_product_view')
        ->select(
            'Order_ID',
            DB::raw('SUM(O_Price * O_unit) as total_order_price'),
            DB::raw('SUM(P_Units * P_Price) as total_product_cost'),
            DB::raw('GROUP_CONCAT(OrderDetail_ID) as OrderDetail_IDs'),
            DB::raw('GROUP_CONCAT(O_Price) as O_Prices'),
            DB::raw('GROUP_CONCAT(O_unit) as O_units'),
            DB::raw('GROUP_CONCAT(OrderDetail_ProductID) as OrderDetail_ProductIDs'),
            DB::raw('GROUP_CONCAT(OrderDetail_CreatedAt) as OrderDetail_CreatedAts'),
            DB::raw('GROUP_CONCAT(Product_ID) as Product_IDs'),
            DB::raw('GROUP_CONCAT(P_Units) as P_Unitss'),
            DB::raw('GROUP_CONCAT(P_Price) as P_Prices'),
            DB::raw('GROUP_CONCAT(P_Date) as P_Dates'),
            DB::raw('GROUP_CONCAT(Product_UpdatedAt) as Product_UpdatedAts'),
            DB::raw('GROUP_CONCAT(Product_CreatedAt) as Product_CreatedAts')
        )
        ->groupBy('Order_ID')
        ->orderBy('Order_ID', 'asc');

    // Apply filters based on request inputs
    if ($request->has('order_id')) {
        $query->where('Order_ID', $request->input('order_id'));
    }

    if ($request->has('start_date') && $request->has('end_date')) {
        $query->whereBetween('OrderDetail_CreatedAt', [$request->input('start_date'), $request->input('end_date')]);
    }

    // Retrieve data
    $orders = $query->get();

    // Return the view with data
    return view('NetProfitReport', compact('orders'));
    }

}
