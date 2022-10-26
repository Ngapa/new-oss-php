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
        Schema::create('pdrb', function (Blueprint $table) {
            $table->increments('id');
            $table->kategori_id('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->float('a')->nullable(); //Pertanian dan Kehutanan
            $table->float('b')->nullable(); //Pertambangan dan Penggalian
            $table->float('c')->nullable(); //Industri
            $table->float('d')->nullable(); //Listrik dan Gas
            $table->float('e')->nullable(); //Air, Sampah/Limbah dan Daur Ulang
            $table->float('f')->nullable(); //Konstruksi
            $table->float('g')->nullable(); //Perdagangan, Reparasi Mobil/Sepeda Motor
            $table->float('h')->nullable(); //Transportasi dan Pergudangan
            $table->float('i')->nullable(); //Penyediaan Akomodasi dan Makan Minum
            $table->float('j')->nullable(); //Informasi dan Komunikasi
            $table->float('k')->nullable(); //Jasa Keuangan dan Asuransi
            $table->float('l')->nullable(); //Real Estate
            $table->float('m_n')->nullable(); //Jasa Perusahaan
            $table->float('o')->nullable(); //Administrasi Pemerintahan, Pertahanan, dan Jaminan Sosial Wajib
            $table->float('p')->nullable(); //Jasa Pendidikan
            $table->float('q')->nullable(); //Jasa Kesehatan dan Kegiatan Sosial
            $table->float('r_s_t_u')->nullable(); //Jasa Lainnya
            $table->float('total_pdrb')->nullable(); 
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
        Schema::dropIfExists('pdrb');
    }
};
