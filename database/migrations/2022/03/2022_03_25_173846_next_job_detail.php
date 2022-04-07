<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NextJobDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_job_details', function (Blueprint $table) {
            $table->id('njdt_id');
            $table->integer('njdt_j_id');
            $table->date('njdt_start_date');
            $table->date('njdt_end_date');
            $table->string('njdt_details', 255);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_job_details');
    }
}