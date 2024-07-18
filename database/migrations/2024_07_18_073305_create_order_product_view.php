<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::statement("
        CREATE VIEW order_product_view AS
        SELECT 
            od.id AS OrderDetail_ID,
            od.O_Price,
            od.O_unit,
            od.Order_ID,
            od.Product_ID AS OrderDetail_ProductID,
            od.created_at AS OrderDetail_CreatedAt,
            p.id AS Product_ID,
            p.P_Units,
            p.P_Price,
            p.P_Date,
            p.updated_at AS Product_UpdatedAt,
            p.created_at AS Product_CreatedAt
        FROM 
            tbl_orderdetail od
        JOIN 
            tbl_product p
        ON 
            od.Product_ID = p.id;
       ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product_view');
    }
};
