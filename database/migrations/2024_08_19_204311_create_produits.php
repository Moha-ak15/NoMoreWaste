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
        Schema::create('produits', function (Blueprint $table) {
            $table->id('produit_id');
            $table->string('code_barre')->unique();
            $table->string('nom');
            $table->string('categorie');
            $table->date('date_peremption');
            $table->integer('quantite');
            $table->unsignedBigInteger('commercant_id');
            $table->timestamps();

            $table->foreign('commercant_id')->references('commercant_id')->on('commercants')->onDelete('cascade'); // permet de lier la table produits à la table commercants
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
