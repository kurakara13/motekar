<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->bigIncrements('problem_id');
            $table->bigInteger('user_id')->unsigned();;
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('project_id')->nullable();
            $table->string('problem');
            $table->string('background');
            $table->text('asal_masalah');
            $table->enum('status',['0','1','2']); // 0 = solve/1 =need team project /2 = on development
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
        Schema::dropIfExists('problems');
    }
}
