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
        Schema::create('tbl_orderdetail', function (Blueprint $table) {
            $table->id();
            $table->integer("O_Price");
            $table->integer("O_unit");
            $table->unsignedBigInteger("Order_ID");
            $table->unsignedBigInteger("Product_ID");
            $table->foreign('Order_ID')->references("id")->on("tbl_orders")->onDelete("cascade");
            $table->foreign('Product_ID')->references("id")->on("tbl_product")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_orderdetail');
    }
};
