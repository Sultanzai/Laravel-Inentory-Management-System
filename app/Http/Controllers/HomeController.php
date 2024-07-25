<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Company;
use App\Models\ProductPriceView;
use App\Models\OrderView;
use App\Models\Expances;
use App\Models\ProductOrderDetailView;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Product Count/////////////////////////////////////////////////////////////////////////////////////////////
        $totalproducts = ProductOrderDetailView::sum('P_Units');
        $totalavailableproducts = ProductOrderDetailView::sum('Available_Units');
        $totalValue = DB::table('view_product_orderdetails')
            ->select(DB::raw('SUM(P_Units * P_Price) as total_value'))
            ->value('total_value');
        $totalAvailiableValue = DB::table('view_product_orderdetails')
            ->select(DB::raw('SUM(Available_Units * P_Price) as total_Available_Units'))
            ->value('total_Available_Units');    

        // Order Count/////////////////////////////////////////////////////////////////////////////////////////////
        $dailyOrders = Order::whereDate('O_Date', today())->count();
        $weeklyOrders = Order::whereBetween('O_Date', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $monthlyOrders = Order::whereMonth('O_Date', now()->month)->count();
        $totalOrders = Order::count();

        // Sales Count/////////////////////////////////////////////////////////////////////////////////////////////
        $dailySales = DB::table('order_view')
        ->whereDate('O_Date', today())
        ->sum('TotalPrice');

        $weeklySales = DB::table('order_view')
            ->whereBetween('O_Date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('TotalPrice');

        $monthlySales = DB::table('order_view')
            ->whereMonth('O_Date', now()->month)
            ->sum('TotalPrice');

        // Calculate total sales
        $totalSales = DB::table('order_view')
            ->sum('TotalPrice');

        // Company Bills /////////////////////////////////////////////////////////////////////////////////////////////
        $dailybill = DB::table('tbl_company')
        ->whereDate('created_at', today())
        ->sum('C_Amount');

        $weeklybill = DB::table('tbl_company')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('C_Amount');

        $monthlybill = DB::table('tbl_company')
            ->whereMonth('created_at', now()->month)
            ->sum('C_Amount');

        // Calculate total sales
        $totalbill = DB::table('tbl_company')
            ->sum('C_Amount');


        // Net Profit /////////////////////////////////////////////////////////////////////////////////////////////
        $dailyO = DB::table('order_product_view')
        ->whereDate('OrderDetail_CreatedAt', today())
        ->selectRaw('SUM(O_Price * O_unit) as total')
        ->value('total');
        $xd = DB::table('order_product_view')
        ->whereDate('OrderDetail_CreatedAt', today())
        ->selectRaw('SUM(P_Price * O_unit) as total')
        ->value('total');

        $dailynet = $dailyO - $xd;  
    
        $weeklyo = DB::table('order_product_view')
            ->whereBetween('OrderDetail_CreatedAt', [now()->startOfWeek(), now()->endOfWeek()])
            ->selectRaw('SUM(O_Price * O_unit) as total')
            ->value('total');
        $xw = DB::table('order_product_view')
            ->whereBetween('OrderDetail_CreatedAt', [now()->startOfWeek(), now()->endOfWeek()])
            ->selectRaw('SUM(P_Price * O_unit) as total')
            ->value('total');
            
        $weeklynet = $weeklyo - $xw;
       
        $monthlyO = DB::table('order_product_view')
            ->whereMonth('OrderDetail_CreatedAt', now()->month)
            ->selectRaw('SUM(O_Price * O_unit) as total')
            ->value('total');
        $xm = DB::table('order_product_view')
            ->whereMonth('OrderDetail_CreatedAt', now()->month)
            ->selectRaw('SUM(P_Price * O_unit) as total')
            ->value('total');
        
        $monthlynet = $monthlyO - $xm; 

        // Calculate total sales
        $totalo = DB::table('order_product_view')
            ->selectRaw('SUM(O_Price * O_unit) as total')
            ->value('total');
        $xt = DB::table('order_product_view')
            ->selectRaw('SUM(P_Price * O_unit) as total')
            ->value('total');

        $totalnet = $totalo - $xt;

        // Expances Count/////////////////////////////////////////////////////////////////////////////////////////////
        $dailyexpances = DB::table('tbl_expances')
        ->whereDate('E_Date', today())
        ->sum('E_Amount');

        $weeklyexpances = DB::table('tbl_expances')
            ->whereBetween('E_Date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('E_Amount');

        $monthlyexpances = DB::table('tbl_expances')
            ->whereMonth('E_Date', now()->month)
            ->sum('E_Amount');

        $totalexpances = DB::table('tbl_expances')
            ->sum('E_Amount');


        // Payment Count /////////////////////////////////////////////////////////////////////////////////////////////
        $completedPayments = DB::table('tbl_payment')
            ->where('P_status', 'Completed')
            ->sum('P_Amount');

            
        $Underprocess = DB::table('tbl_payment')
            ->where('P_status', 'Under Process')
            ->sum('P_Amount');


        $Unpaid = DB::table('tbl_payment')->sum('P_Amount');
        $Unpaid = $totalSales-$Unpaid; 



        // Revenue /////////////////////////////////////////////////////////////////////////////////////////////
        $Revenue = $totalnet - $totalexpances;
        $Revenue = number_format($Revenue, 2);

        $TotalRevenue = $totalSales + $totalAvailiableValue - $totalexpances;
        $TotalRevenue = number_format($TotalRevenue, 2);



        // Pass the data to the view
        return view('dashboard', compact(
            // Orders
            'dailyOrders', 'weeklyOrders', 'monthlyOrders','totalOrders',
            'totalproducts', 'totalavailableproducts', 'totalValue', 'totalAvailiableValue',
            'dailySales','weeklySales','monthlySales','totalSales',
            'dailynet','weeklynet','monthlynet','totalnet',
            'completedPayments','Underprocess','Unpaid','Revenue','TotalRevenue',
            'dailyexpances','weeklyexpances','monthlyexpances','totalexpances',
            'dailybill','weeklybill','monthlybill','totalbill'

        ));
    }
}
