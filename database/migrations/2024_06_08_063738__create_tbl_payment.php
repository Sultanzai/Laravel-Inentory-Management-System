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
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->id();
            $table->integer("P_Amount");
            $table->string("P_Type");
            $table->string("P_Status");
            $table->date("P_Date");
            $table->unsignedBigInteger("Order_ID");
            $table->unsignedBigInteger("Customer_ID");
            $table->foreign('Order_ID')->references("id")->on("tbl_orders")->onDelete("cascade");
            $table->foreign('Customer_ID')->references("id")->on("tbl_customer")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
