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
        Schema::create('cell_meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cell_id');
            $table->timestamp('date');
            $table->timestamps();

            //constraints
            $table->foreign('cell_id')->references('id')->on('cells');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cell_meetings');
    }
};
