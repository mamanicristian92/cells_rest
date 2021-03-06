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
        Schema::create('attendances', function (Blueprint $table) {
            $table->foreignId('parishioner_id');
            $table->foreignId('cell_id');
            $table->date('date');
            $table->timestamps();
            //constraints
            $table->foreign('parishioner_id')->references('id')->on('parishioners');
            $table->foreign('cell_id')->references('id')->on('cells');
            $table->primary(['parishioner_id','cell_id','date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
