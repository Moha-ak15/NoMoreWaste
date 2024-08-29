<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('collectes', function (Blueprint $table) {
            $table->id('collecte_id');
            $table->date('date_collecte');
            $table->enum('statut_collecte', ['programmer', 'en cours', 'terminer', 'annuler']);
            $table->integer('quantite_collectee');
            $table->unsignedBigInteger('commercant_id');
            $table->unsignedBigInteger('produit_id');
            $table->timestamps();

            $table->foreign('commercant_id')->references('commercant_id')->on('commercants')->onDelete('cascade');
            $table->foreign('produit_id')->references('produit_id')->on('produits')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('collectes');
    }
};
