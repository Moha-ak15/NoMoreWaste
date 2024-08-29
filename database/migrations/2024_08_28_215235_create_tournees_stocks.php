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
        Schema::create('tournees_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('tournee_id');
            $table->timestamps();

            // Définir manuellement les clés étrangères
            $table->foreign('stock_id')->references('stock_id')->on('stocks')->onDelete('cascade');
            $table->foreign('tournee_id')->references('tournee_id')->on('tournees')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournees_stocks');
    }
};
