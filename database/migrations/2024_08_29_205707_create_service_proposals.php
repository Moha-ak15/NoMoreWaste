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
        Schema::create('service_proposals', function (Blueprint $table) {
            $table->id('proposal_id');
            $table->unsignedBigInteger('user_id');
            $table->string('proposeur')->nullable();  // Nom du proposeur
            $table->string('nom');
            $table->text('description');
            $table->enum('statut', ['en attente', 'approuvé', 'rejeté'])->default('en attente');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services', 'service_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_proposals');
    }
};
