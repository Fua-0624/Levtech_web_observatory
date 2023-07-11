<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observatories', function (Blueprint $table) {
            $table->id();
            $table->string('prefecture');
            $table->string('observatory');
            $table->boolean('hotel');
            $table->boolean('planetarium');
            $table->string('HP_link');
            $table->string('address_number');
            $table->string('address');
            $table->string('google_url');
            $table->integer('size');
            $table->foreignId('region_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observatories');
    }
};
