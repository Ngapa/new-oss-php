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
        Schema::create('ketimpangan', function (Blueprint $table) {
            $table->id();
            $table->enum('pddk', ['rendah', 'sedang', 'tinggi'])->nullable()->default(['rendah']);
            $table->float('jumlah')->nullable();
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
        Schema::dropIfExists('ketimpangan');
    }
};
