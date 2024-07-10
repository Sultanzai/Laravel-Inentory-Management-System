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
        DB::statement('
            CREATE VIEW product_price_view AS
            SELECT 
                p.id,
                p.P_Name,
                p.P_Price,
                od.O_unit,
                od.latest_order_date
            FROM 
                tbl_product p
            LEFT JOIN 
                (
                    SELECT 
                        Product_ID,
                        O_unit,
                        MAX(created_at) as latest_order_date
                    FROM 
                        tbl_orderdetail
                    WHERE 
                        O_unit IS NOT NULL AND created_at IS NOT NULL
                    GROUP BY
                        Product_ID, O_unit
                ) od
            ON 
                p.id = od.Product_ID
            WHERE
                od.O_unit IS NOT NULL AND (od.latest_order_date IS NOT NULL AND od.latest_order_date != 0)
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS product_price_view');
    }
};
