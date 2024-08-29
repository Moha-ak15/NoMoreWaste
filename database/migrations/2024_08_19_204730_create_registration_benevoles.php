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
        Schema::create('registration_benevoles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('benevole_id')->constrained('benevoles', 'benevole_id')->onDelete('cascade');
            $table->foreignId('tournee_id')->constrained('tournees', 'tournee_id')->onDelete('cascade');
            $table->string('role')->default('participant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_benevoles');
    }
};
