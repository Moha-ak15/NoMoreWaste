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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantite_disponible');
            $table->date('date_entree_stock');
            $table->timestamps();

            $table->foreign('produit_id')->references('produit_id')->on('produits')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
