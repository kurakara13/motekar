<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_developments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText("development_story");
            $table->string("mockup_file");
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
        Schema::dropIfExists('product_developments');
    }
}
