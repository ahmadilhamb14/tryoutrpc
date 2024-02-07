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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); //password should be in hash
            $table->string('fullname');
            $table->unsignedBigInteger('id_school');
            $table->boolean('isAdmin')->default(false); 
            // $table->rememberToken();
            $table->timestamps(); # a must for tinker

            $table->foreign('id_school')->references('id')->on('sekolahs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
