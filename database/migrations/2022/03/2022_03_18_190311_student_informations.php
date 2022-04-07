<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_information', function (Blueprint $table) {
            $table->id('si_id');
            $table->string('si_st_num', 12);
            $table->string('si_st_card', 13)->nullable();
            $table->integer('si_md_pre_th_id');
            $table->string('si_firstname_th', 30);
            $table->string('si_middlename_th', 30)->nullable();
            $table->string('si_lastname_th', 30);
            $table->integer('si_md_pre_eng_id');
            $table->string('si_firstname_en', 30);
            $table->string('si_middlename_en', 30)->nullable();
            $table->string('si_lastname_en', 30);
            $table->string('si_nickname', 30)->nullable();
            $table->integer('si_md_year_of_study_id')->nullable();
            $table->integer('si_md_year_class_id')->nullable();
            $table->integer('si_md_faculty_id')->nullable();
            $table->integer('si_md_field_id')->nullable();
            $table->integer('si_md_course_id')->nullable();
            $table->date('si_dob')->nullable();
            $table->integer('si_md_ethnicity_id')->nullable();
            $table->integer('si_md_nationality_id')->nullable();
            $table->integer('si_md_gender_id')->nullable();
            $table->float('si_weight', 6, 2)->nullable();
            $table->float('si_height', 6, 2)->nullable();
            $table->float('si_gpa', 3, 2)->nullable();
            $table->float('si_last_gpa', 3, 2)->nullable();
            $table->string('si_phone_num', 10)->nullable();
            $table->string('si_email', 35)->nullable();
            $table->string('si_emergency_contact_name', 30)->nullable();
            $table->string('si_emergency_contact', 20)->nullable();
            $table->string('si_address')->nullable();
            $table->integer('si_md_province_id')->nullable();
            $table->integer('si_md_district_id')->nullable();
            $table->integer('si_md_sub_district_id')->nullable();
            $table->integer('si_md_postal_code_id')->nullable();
            $table->string('si_avatar_file')->nullable();
            $table->timestamp('si_create_at')->nullable();
            $table->timestamp('si_update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_information');
    }
}