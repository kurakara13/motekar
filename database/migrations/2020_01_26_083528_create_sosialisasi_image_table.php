<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSosialisasiImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sosialisasi_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->bigInteger('sosialisasi_id')->references('id')->on('sosialisasi');
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
        Schema::dropIfExists('sosialisasi_image');
    }
}
