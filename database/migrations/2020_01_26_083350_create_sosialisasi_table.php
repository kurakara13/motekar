<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSosialisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sosialisasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('judul');
            $table->longText('lokasi');
            $table->longText('post');
            $table->bigInteger("project_id")->references('id')->on("projects");
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
        Schema::dropIfExists('sosialisasi');
    }
}
