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
        Schema::create('commercants', function (Blueprint $table) {
            $table->id('commercant_id');
            $table->string('entreprise', 255);
            $table->string('responsable', 50);
            $table->string('adresse');
            $table->string('email')->unique();
            $table->string('telephone', 20)->unique();
            $table->string('type_commercant', 50);
            $table->date('date_adhesion');
            $table->date('date_renouvellement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercants');
    }
};
