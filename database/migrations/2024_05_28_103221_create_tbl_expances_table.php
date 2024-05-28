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
        Schema::create('tbl_expances', function (Blueprint $table) {
            $table->id();
            $table->string("E_Name");
            $table->string("E_Descriptio");
            $table->integer("E_Amount");
            $table->date("E_Date");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_expances');
    }
};
