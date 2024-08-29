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
        Schema::create('collecte_vehicule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collecte_id');
            $table->unsignedBigInteger('vehicule_id');
            $table->timestamps();

            // Définir manuellement les clés étrangères
            $table->foreign('collecte_id')->references('collecte_id')->on('collectes')->onDelete('cascade');
            $table->foreign('vehicule_id')->references('vehicule_id')->on('vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collecte_vehicules');
    }
};
