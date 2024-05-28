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
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->id();
            $table->text("O_Description");
            $table->float("O_Total");
            $table->date("O_Date");
            $table->unsignedBigInteger("Customer_ID");
            $table->foreign('Customer_ID')->references("id")->on("tbl_customer")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_orders');
    }
};
