<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Company extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('cp_id');
            $table->string('cp_name_th', 255);
            $table->string('cp_name_en', 255)->nullable();
            $table->string('cp_address_no', 255);
            $table->string('cp_address_moo', 255)->nullable();
            $table->string('cp_address_soy', 255)->nullable();
            $table->string('cp_address_road', 255)->nullable();
            $table->string('cp_address_sub_district', 255);
            $table->string('cp_address_district', 255);
            $table->string('cp_address_province', 255);
            $table->string('cp_address_zipcode', 5);
            $table->string('cp_address_latitude')->nullable();
            $table->string('cp_address_longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}