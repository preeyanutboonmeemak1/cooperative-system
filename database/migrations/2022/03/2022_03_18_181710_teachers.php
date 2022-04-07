<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('ta_id');
            $table->integer('ta_yc_id');
            $table->integer('ta_prefix_th_id');
            $table->string('ta_firstname_th', 255);
            $table->string('ta_middlename_th', 255)->nullable();
            $table->string('ta_lastname_th', 255);
            $table->integer('ta_prefix_en_id');
            $table->string('ta_firstname_en', 255);
            $table->string('ta_middlename_en', 255)->nullable();
            $table->string('ta_lastname_en', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}