<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('problem_id')->unsigned();;
            $table->string('project_name');
            $table->string('project_description');
            $table->bigInteger('project_owner')->unsigned();;
            $table->string('project_status');
            $table->string('project_tags');
            $table->foreign('problem_id')->references('problem_id')->on('problems');
            $table->foreign('project_owner')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
