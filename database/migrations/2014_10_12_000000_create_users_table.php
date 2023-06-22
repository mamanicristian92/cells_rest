<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            //laravel %% jetstream columns
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
            //persons columns
            $table->foreignId('user_type_id');
            $table->foreignId('doc_type')->nullable();
            $table->bigInteger('doc_number')->nullable();
            $table->date('birthday')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->text('city')->nullable();
            $table->text('phone_number')->nullable();
            $table->boolean('enabled')->default(1);
            //constrains
            //$table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
        });

        User::create([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make('m123456n'),
            'user_type_id'=>1,
            'doc_type'=>1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
