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
        Schema::create('tenaga_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->float('angkatan_kerja')->nullable();
            $table->float('pengangguran')->nullable();
            $table->float('bkn_angkatan_kerja')->nullable();
            $table->float('sekolah')->nullable();
            $table->float('urus_ruta')->nullable();
            $table->float('tpak')->nullable();
            $table->float('tkk')->nullable();
            $table->float('tpt')->nullable();
            $table->float('lainnya')->nullable();
            $table->enum('gender', ['lk', 'pr']);
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
        Schema::dropIfExists('tenaga_kerja');
    }
};
