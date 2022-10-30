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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->integer('a'); //0-4 Tahun
            $table->integer('b'); //5-9 Tahun
            $table->integer('c'); //10-14 Tahun
            $table->integer('d'); //15-19 Tahun
            $table->integer('e'); //20-24 Tahun
            $table->integer('f'); //25-29 Tahun
            $table->integer('g'); //30-34 Tahun
            $table->integer('h'); //35-39 Tahun
            $table->integer('i'); //40-44 Tahun
            $table->integer('j'); //45-49 Tahun
            $table->integer('k'); //50-54 Tahun
            $table->integer('l'); //55-59 Tahun
            $table->integer('m'); //60-64 Tahun
            $table->integer('n'); //65-69 Tahun
            $table->integer('o'); //70-74 Tahun
            $table->integer('p'); //75+ Tahun
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
};
