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
            tbl_orders.O_Date,
            tbl_orderdetail.id AS OrderDetail_ID,
            tbl_orderdetail.O_price,
            tbl_orderdetail.O_unit,
            tbl_customer.Name AS Customer_Name
        FROM tbl_orders
        INNER JOIN tbl_orderdetail ON tbl_orders.id = tbl_orderdetail.Order_ID
        INNER JOIN tbl_customer ON tbl_orders.Customer_ID = tbl_customer.id
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
