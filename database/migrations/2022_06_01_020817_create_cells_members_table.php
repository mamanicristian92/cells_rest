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
        Schema::create('cells_members', function (Blueprint $table) {
            $table->foreignId('cell_id');
            $table->foreignId('parishioner_id');
            $table->timestamps();
            //constraints
            $table->foreign('cell_id')->references('id')->on('cells');
            $table->foreign('parishioner_id')->references('id')->on('parishioners');
            $table->primary(['cell_id', 'parishioner_id']);
        });
        //
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
