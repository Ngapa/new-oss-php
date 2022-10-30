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
        Schema::create('kemiskinan', function (Blueprint $table) {
            $table->id();
            $table->float('pddk_mskn')->nullable();
            $table->float('p0')->nullable();
            $table->float('p1')->nullable();
            $table->float('p2')->nullable();
            $table->float('gk')->nullable();
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
        Schema::dropIfExists('kemiskinan');
    }
};
