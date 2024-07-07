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
        Schema::create('tbl_company', function (Blueprint $table) {
            $table->id();
            $table->string('C_Name');
            $table->string('C_Phone');
            $table->string('C_Description');
            $table->integer('C_Amount');
            $table->string('C_Status');
            $table->string('C_Type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_company');
    }
};
