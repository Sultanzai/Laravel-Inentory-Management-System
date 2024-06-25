

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
    CREATE VIEW order_view AS
    SELECT
        tbl_orders.id AS Order_ID,
        tbl_orders.Customer_ID,
        tbl_orders.O_Description,
        tbl_orders.O_Date,
        tbl_customer.Name AS Customer_Name,
        tbl_customer.Address,
        GROUP_CONCAT(tbl_orderdetail.id) AS OrderDetail_IDs,
        GROUP_CONCAT(tbl_orderdetail.O_price) AS OrderPrices,
        GROUP_CONCAT(tbl_orderdetail.O_unit) AS OrderUnits,
        GROUP_CONCAT(tbl_product.P_Name) AS ProductNames,
        GROUP_CONCAT(tbl_product.Barcode) AS ProductBarcodes,
        SUM(tbl_orderdetail.O_price * tbl_orderdetail.O_unit) AS TotalPrice
    FROM tbl_orders
    INNER JOIN tbl_orderdetail ON tbl_orders.id = tbl_orderdetail.Order_ID
    INNER JOIN tbl_customer ON tbl_orders.Customer_ID = tbl_customer.id
    INNER JOIN tbl_product ON tbl_orderdetail.product_id = tbl_product.id
    GROUP BY 
        tbl_orders.id, 
        tbl_orders.Customer_ID, 
        tbl_orders.O_Description, 
        tbl_orders.O_Date, 
        tbl_customer.Name, 
        tbl_customer.Address
");

    
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_view');
    }
};
