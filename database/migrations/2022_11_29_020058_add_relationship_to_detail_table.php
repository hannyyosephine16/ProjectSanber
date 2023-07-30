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
        Schema::table('detail', function (Blueprint $table) {
            $table->unsignedInteger('klinik_id');
            $table->foreign('klinik_id','klinik_fk_1945')->references('id')->on('klinik');
        });
    }
};
