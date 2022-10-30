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
        Schema::create('ipm', function (Blueprint $table) {
            $table->id();
            $table->float('uhh')->nullable();
            $table->float('rls')->nullable();
            $table->float('hls')->nullable();
            $table->float('ppp')->nullable();
            $table->float('ipm')->nullable();
            $table->float('pertumbuhan')->nullable();
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
        Schema::dropIfExists('ipm');
    }
};
