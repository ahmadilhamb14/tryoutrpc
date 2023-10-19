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
        Schema::create('sub_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tryout');
            // $table->timestamps();
            $table->string('subtes'); //value should be : penalaran umum, pengetahuan&pemahaman umum, memahami bacaan&menulis, pengetahuan kuantitatif, bahasa indoneisa, bahasa inggris, penalaran matematika,karakteristik pribadi, intelegensia umum, wawasan kebangsaan
            $table->time('timer');

            $table->foreign('id_tryout')->references('id')->on('tryouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_tests');
    }
};
