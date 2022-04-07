<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_teachers', function (Blueprint $table) {
            $table->id('st_id');
            $table->string('st_st_num', 45);
            $table->string('st_name', 45);
            $table->integer('st_md_year_class_id');
            $table->string('st_md_faculty_id', 45);
            $table->integer('st_md_course_id');
            $table->string('st_teachers_name', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_teachers');
    }
}