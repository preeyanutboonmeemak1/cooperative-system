<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_reports', function (Blueprint $table) {
            $table->id('wr_id');
            $table->integer('wr_st_id');
            $table->integer('wr_week_id');
            $table->string('wr_name',45);
            $table->string('status', 30);
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
        Schema::dropIfExists('week_reports');
    }
}