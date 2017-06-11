<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLabResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_id')->index()->unsigned()->comment('relation to users');
            $table->dateTime('reg_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->integer('user_id')->index()->unsigned()->comment('owner result');
            $table->text('description')->nullabel();
            $table->integer('staff_id')->index()->unsigned()->comment('staff in lab');
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
        Schema::dropIfExists('lab_results');
    }
}
