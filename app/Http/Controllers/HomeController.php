<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderView;
use App\Models\ProductOrderDetailView;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Product Count
        $totalproducts = ProductOrderDetailView::sum('P_Units');
        $totalavailableproducts = ProductOrderDetailView::sum('Available_Units');
        $totalValue = DB::table('view_product_orderdetails')
            ->select(DB::raw('SUM(P_Units * P_Price) as total_value'))
            ->value('total_value');
        $totalAvailiableValue = DB::table('view_product_orderdetails')
            ->select(DB::raw('SUM(Available_Units * P_Price) as total_Available_Units'))
            ->value('total_Available_Units');    

        // Order Count
        $dailyOrders = Order::whereDate('created_at', today())->count();
        $weeklyOrders = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $monthlyOrders = Order::whereMonth('created_at', now()->month)->count();
        $totalOrders = Order::count();
       
        // Sales Count
        $dailySales = DB::table('Order_View')
        ->whereDate('O_Date', today())
        ->sum('TotalPrice');

        // Calculate weekly sales
        $weeklySales = DB::table('Order_View')
            ->whereBetween('O_Date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('TotalPrice');

        // Calculate monthly sales
        $monthlySales = DB::table('Order_View')
            ->whereMonth('O_Date', now()->month)
            ->sum('TotalPrice');

        // Calculate total sales
        $totalSales = DB::table('Order_View')
            ->sum('TotalPrice');

        // Payment Count 
        $completedPayments = DB::table('tbl_payment')
            ->where('P_status', 'Completed')
            ->sum('P_Amount');
            
        $Underprocess = DB::table('tbl_payment')
            ->where('P_status', 'Under Process')
            ->sum('P_Amount');

        $Unpaid = DB::table('tbl_payment')->sum('P_Amount');
        $Unpaid = $totalSales-$Unpaid; 


        // Revenue 
        $Revenue = $totalSales + $totalAvailiableValue;


        // Pass the data to the view
        return view('dashboard', compact(
            // Orders
            'dailyOrders', 'weeklyOrders', 'monthlyOrders','totalOrders',
            'totalproducts', 'totalavailableproducts', 'totalValue', 'totalAvailiableValue',
            'dailySales','weeklySales','monthlySales','totalSales',
            'completedPayments','Underprocess','Unpaid','Revenue'

        ));
    }
}
