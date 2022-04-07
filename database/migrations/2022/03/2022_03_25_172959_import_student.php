<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImportStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_students', function (Blueprint $table) {
            $table->id('is_id');
            $table->string('is_st_num', 10);
            $table->integer('is_md_pre_th_id');
            $table->string('is_firstname_th', 255);
            $table->string('is_lastname_th', 255);
            $table->integer('is_md_pre_eng_id');
            $table->string('is_firstname_en', 255);
            $table->string('is_lastname_en', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_students');
    }
}