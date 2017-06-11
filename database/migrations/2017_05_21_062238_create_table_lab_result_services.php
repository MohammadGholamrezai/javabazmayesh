<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLabResultServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_result_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_result_id')->index()->unsigned();
            $table->integer('service_id')->index()->unsigned();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_result_services');
    }
}
