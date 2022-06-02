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
            $table->string('lastname');
            $table->string('firstname');
            $table->string('doctype');
            $table->string('docnumber');
            $table->date('birthday');
            $table->string('address');
            $table->string('phonenumber');
            $table->timestamps();
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
