<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id('merchant_id');
            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->date('joining_date');
            $table->date('renewal_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
