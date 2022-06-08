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
        Schema::create('parishioners', function (Blueprint $table) {
            $table->id();
            $table->text('lastname')->nullable();
            $table->text('firstname');
            $table->text('doctype')->nullable();
            $table->bigInteger('docnumber')->nullable();
            $table->date('birthday')->nullable();
            $table->text('address')->nullable(9);
            //$table->foreignId('city_id')->nullable();
            $table->text('city')->nullable(9);
            $table->foreignId('state_id')->nullable();
            $table->bigInteger('phonenumber')->nullable();
            $table->timestamps();
            //constrains
            //$table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unique(['doctype','docnumber']);
        });
        if (Schema::hasColumn('users', 'email')) {
            // The "users" table exists and has an "email" column...
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parishioners');
    }
};
