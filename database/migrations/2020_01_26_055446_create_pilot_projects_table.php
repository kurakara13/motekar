<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilotProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilot_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("lokasi_pilot");
            $table->longText("development_story");
            // $table->string("mockup_file");
            $table->string("doc_file");
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
        Schema::dropIfExists('pilot_projects');
    }
}
