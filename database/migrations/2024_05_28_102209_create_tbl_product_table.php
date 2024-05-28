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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->string("P_Name");
            $table->string("P_Description");
            $table->integer("P_Units");
            $table->integer("P_Price");
            $table->string("P_Status");
            $table->date("P_Date");
            $table->string("Barcode");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
