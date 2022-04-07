<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CertiForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certi_form', function (Blueprint $table) {
            $table->id('cf_id');
            $table->integer('cf_d_id');
            $table->string('subject_TH', 45);
            $table->string('subject_Eng', 45);
            $table->date('date_test');
            $table->date('date_confirm');
            $table->string('status', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certi_form');
    }
}