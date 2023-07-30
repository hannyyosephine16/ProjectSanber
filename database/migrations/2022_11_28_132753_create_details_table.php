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
        Schema::create('detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe');
            $table->string('tanggal');
            $table->string('jam');
            $table->string('subjective');
            $table->string('objective');
            $table->string('assessment');
            $table->string('planning');
            $table->string('instruksi');
            $table->string('role');
            $table->string('obat');
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
        Schema::dropIfExists('detail');
    }
};
