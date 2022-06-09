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
        Schema::create('cells', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('leader_id');
            $table->foreignId('assistant_id');
            $table->text('address');
            $table->text('city');
            $table->foreignId('city_id')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->timestamps();
            //constraints
            $table->foreign('leader_id')->references('id')->on('leaders');
            $table->foreign('assistant_id')->references('id')->on('assistants');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cells');
    }
};
