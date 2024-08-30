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
        Schema::create('service_plannings', function (Blueprint $table) {
            $table->id('planning_id');
            $table->foreignId('service_id')->constrained('services', 'service_id')->onDelete('cascade');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();
            $table->string('lieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_planning');
    }
};
