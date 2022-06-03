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
            $table->text('lastname');
            $table->text('firstname');
            $table->text('doctype');
            $table->biInteger('docnumber');
            $table->date('birthday');
            $table->text('address');
            $table->foreignId('city_id');
            $table->bigInteger('phonenumber');
            $table->timestamps();
            //constrains
            $table->foreign('city_id')->references('id')->on('cities');
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
