<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement('
            CREATE VIEW view_product_orderdetails AS
            SELECT 
                p.ID,
                p.P_Name,
                p.P_Price,
                p.P_Units,
                p.P_Status,
                p.Barcode,
                p.P_Date,
                COALESCE(p.P_Units - SUM(od.O_unit), p.P_Units) AS Available_Units
            FROM 
                tbl_product p
            LEFT JOIN 
                tbl_orderdetail od
            ON 
                p.ID = od.Product_ID
            GROUP BY
                p.ID, p.P_Name, p.P_Price, p.P_Units, p.P_Status, p.Barcode, p.P_Date
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_orderdetails_view');
    }
};
