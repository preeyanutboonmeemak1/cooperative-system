<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_companys', function (Blueprint $table) {
            $table->id('sc_id');
            $table->string('sc_st_num', 45);
            $table->string('sc_name', 45);
            $table->integer('sc_md_year_class_id');
            $table->string('sc_md_faculty_id', 45);
            $table->integer('sc_md_course_id');
            $table->string('sc_companys_name', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_companys');
    }
}