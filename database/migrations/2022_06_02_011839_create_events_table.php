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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->foreignId('eventtype_id');
            $table->text('locationname');
            $table->text('address');
            $table->text('registerlink')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->text('city')->nullable();
            $table->timestamp('starttime');
            $table->timestamp('endtime')->nullable();
            $table->text('photopath')->nullable();
            $table->timestamps();
            //constraints
            $table->foreign('eventtype_id')->references('id')->on('eventtypes');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
