<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDoctorExpertises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_expertise', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->index()->unsigned();
            $table->integer('expertise_id')->index()->unsigned();
            $table->integer('university_id')->index()->unsigned();
            $table->date('reg_date')->nullable()->comment('zamane gereftane madrak');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_expertise');
    }
}
