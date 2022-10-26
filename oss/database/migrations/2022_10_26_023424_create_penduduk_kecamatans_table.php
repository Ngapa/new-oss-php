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
        Schema::create('penduduk_kecamatan', function (Blueprint $table) {
            $table->id();
            $table->enum('kecamatan', ['dayeuhluhur', 'wanareja', 'majenang', 'cimanggu', 'karangpucung', 'cipari', 'sidareja', 'kedungreja', 'patimuan', 'gandrungmangu', 'bantarsari', 'kawunganten', 'kampung_laut', 'jeruklegi', 'kesugihan', 'adipala', 'maos', 'kroya', 'binangun', 'sampang', 'nusawungu', 'cilacap_selatan', 'cilacap_tengah', 'cilacap_utara']);
            $table->integer('lk');
            $table->integer('pr');
            $table->integer('total');
            $table->integer('rasio_jk');
            $table->date('created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk_kecamatan');
    }
};
