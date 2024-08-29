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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id('vehicule_id');
            $table->string('immatriculation');
            $table->string('marque');
            $table->string('modele');
            $table->string('type');
            $table->integer('capacite'); // Capacité en kg
            $table->string('statut')->default('disponible'); // Statut: disponible ou réservé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
