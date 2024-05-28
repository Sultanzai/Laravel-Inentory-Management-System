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
        Schema::create('tbl_income', function (Blueprint $table) {
            $table->id();
            $table->integer("I_Total");
          
            $table->unsignedBigInteger("Customer_ID");
            $table->unsignedBigInteger("Order_ID");
            $table->unsignedBigInteger("Payment_ID");
            $table->foreign('Customer_ID')->references("id")->on("tbl_customer")->onDelete("cascade");
            $table->foreign('Order_ID')->references("id")->on("tbl_orders")->onDelete("cascade");
            $table->foreign('Payment_ID')->references("id")->on("tbl_payment")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_income');
    }
};
