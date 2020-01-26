<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectIdToDasarImplementasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dasar_implementasi', function (Blueprint $table) {
            $table->bigInteger("project_id")->references('id')->on("projects");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dasar_implementasi', function (Blueprint $table) {
            //
        });
    }
}
