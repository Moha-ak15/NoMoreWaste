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
        Schema::create('benevole_collecte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collecte_id');
            $table->unsignedBigInteger('benevole_id');
            $table->timestamps();

        // Définir manuellement les clés étrangères
        $table->foreign('collecte_id')->references('collecte_id')->on('collectes')->onDelete('cascade');
        $table->foreign('benevole_id')->references('benevole_id')->on('benevoles')->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benevole_collecte');
    }
};
