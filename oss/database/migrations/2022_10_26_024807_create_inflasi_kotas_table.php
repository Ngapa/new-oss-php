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
        Schema::create('inflasi_kota', function (Blueprint $table) {
            $table->id();
            $table->enum('nama_kota', ['cilacap', 'purwokerto', 'kudus', 'surakarta', 'semarang', 'tegal', 'nasional']);
            $table->float('mtom')->nullable();
            $table->float('ytod')->nullable();
            $table->float('ytoy')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('inflasi_kotas');
    }
};
