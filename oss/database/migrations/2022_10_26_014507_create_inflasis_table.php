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
        Schema::create('inflasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->float('sembako')->nullable(); //Makanan, Minuman, Tembakau
            $table->float('sandang')->nullable(); //Pakaian dan Alas Kaki
            $table->float('perumahan')->nullable(); //Perumahan, Air, Listrik, BB Lain
            $table->float('perlengkapan')->nullable(); //Perlengkapan, Pemeliharaan Rutin Rumah Tangga
            $table->float('kesehatan')->nullable();
            $table->float('transportasi')->nullable();
            $table->float('informasi')->nullable(); //Informasi, Komunikasi, Keuangan
            $table->float('rekreasi')->nullable(); //Rekereasi, Olahraga, Budaya
            $table->float('pendidikan')->nullable();
            $table->float('penyedia_pangan')->nullable(); //Penyedia makanan, minuman / restoran
            $table->float('perawatan_pribadi')->nullable(); //Perawatan Pribadi dan Jasa Lainnya
            $table->float('total_inflasi')->nullable(); //Total Inflasi
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
        Schema::dropIfExists('inflasi');
    }
};
