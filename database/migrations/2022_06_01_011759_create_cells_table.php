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
            $table->text('city_id')->nullable();
            $table->timestamps();
            //constraints
            $table->foreign('leader_id')->references('id')->on('leaders');
            $table->foreign('assistant_id')->references('id')->on('assistants');
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
