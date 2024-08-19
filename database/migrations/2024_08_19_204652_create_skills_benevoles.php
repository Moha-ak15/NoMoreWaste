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
        Schema::create('skills_benevoles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('benevole_id')->constrained('benevoles')->onDelete('cascade');
            $table->string('competence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills_benevoles');
    }
};
